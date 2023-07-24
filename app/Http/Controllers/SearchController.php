<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class SearchController extends Controller
{
    public function searchBook()
    {
        $query = request('query');
        $booksQuery = Book::query();

        $booksQuery->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where("book_title", "like", '%' . $query . '%')
                         ->orWhere('book_quantity', 'like', '%' . $query . '%');
        });

        if(!app('isAdmin')) {
            $booksQuery->whereIn('id', auth()->user()->books->pluck('id'));
        }

        $books = $booksQuery->latest()->paginate(10);
        $categories = Category::get();

        return view('books.index', compact('books', 'categories'));
    }

    public function searchCategory()
    {
        $query = request('query');
        $categories = Category::where("name", "like", '%' . $query . '%')->latest()->paginate(5);

        return view('categories.index', compact('categories'));

    }
}
