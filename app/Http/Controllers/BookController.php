<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use App\Http\Requests\{BookRequest, BookUpdateRequest};
use App\Models\{Book, Category, User};
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $book_category = $request->query('filter_book');
        $booksQuery = Book::query();

        if ($book_category) {
            $booksQuery->where('category_id', 'like', '%' . $book_category . '%');
        }

        if(!app('isAdmin')) {
            $booksQuery->whereIn('id', auth()->user()->books->pluck('id'));
        }

        $books = $booksQuery->latest()->paginate(10);

        return view('books.index', [
            'book' => new Book(),
            'books' => $books,
            'categories' => Category::get(),
        ]);
    }

    public function show(Book $book)
    {
        $this->authorize('authorizeBook', $book);

        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create', [
            'book' => new Book(),
            'submit' => 'Save Book',
            'categories' => Category::get(),
        ]);
    }

    public function store(BookRequest $request)
    {
        $attributes = $request->all();

        $book_cover = $request->file('book_cover')->store("images/book_covers");
        $book_file = $request->file('book_file')->store("files/book_files");

        $attributes['category_id'] = $request->category;
        $attributes['book_cover'] = $book_cover;
        $attributes['book_file'] = $book_file;
        auth()->user()->books()->create($attributes);

        return redirect(route('books.index'))->with('success', 'Add book data successfully.');
    }

    public function edit(Book $book)
    {
        $this->authorize('authorizeBook', $book);

        return view('books.edit', [
            'book' => $book,
            'submit' => 'Update Book',
            'categories' => Category::get(),
        ]);
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $this->authorize('authorizeBook', $book);

        if($request->file('book_cover')) {
            Storage::delete($book->book_cover);

            $book_cover = $request->file('book_cover')->store("images/book_covers");
        } else {
            $book_cover = $book->book_cover;
        }

        if($request->file('book_file')) {
            Storage::delete($book->book_file);

            $book_file = $request->file('book_file')->store("files/book_files");
        } else {
            $book_file = $book->book_file;
        }

        $attributes = $request->all();

        $attributes['category_id'] = $request->category;
        $attributes['book_cover'] = $book_cover;
        $attributes['book_file'] = $book_file;
        $book->update($attributes);

        return redirect(route('books.index'))->with('success', 'Update book data successfully.');
    }

    public function destroy(Book $book)
    {
        $this->authorize('authorizeBook', $book);

        Storage::delete($book->book_cover);
        Storage::delete($book->book_file);
        $book->delete();

        return redirect(route('books.index'))->with('success', 'Delete book data successfully.');
    }

    public function exportPdf()
    {
        $books = Book::all();

        if(!app('isAdmin')) {
            $books = auth()->user()->books()->get();
        }

        $filename = 'book-data-' . Carbon::now()->toDateString() .'-'.Carbon::now()->timestamp;
        view()->share('books', $books);
        $pdf = Pdf::loadView('books/exports/book-pdf', array('books' =>  $books))->setPaper('a4', 'portrait');

        return $pdf->download($filename . '.pdf');
    }

    public function exportExcel()
    {
        $filename = 'book-data-' . Carbon::now()->toDateString() .'-'.Carbon::now()->timestamp;

        return (new BookExport())->download($filename . '.xlsx');
    }
}
