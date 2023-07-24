<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class BookExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $books = Book::all();

        if(!app('isAdmin')) {
            $books = auth()->user()->books()->get();
        }

        return view('books.exports.book-excel', [
            'books' => $books
        ]);
    }
}
