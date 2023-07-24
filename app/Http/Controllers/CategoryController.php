<?php

namespace App\Http\Controllers;

use App\Models\{Book, Category};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('authorizeCategory');

        return view('categories.index', [
            'categories' => Category::latest()->paginate(5),
        ]);
    }

    public function show(Category $category)
    {
        $booksQuery = Book::query();

        if(!app('isAdmin')) {
            $booksQuery->where('user_id', auth()->user()->id);
        }

        if ($category) {
            $booksQuery->where('category_id', $category->id);
        }

        $categories = Category::get();
        $books = $booksQuery->latest()->paginate(10);

        return view('books.index', compact('books', 'category', 'categories'));
    }

    public function create()
    {
        $this->authorize('authorizeCategory');

        return view('categories.create', [
            'category' => new Category(),
            'submit' => 'Save Category',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('authorizeCategory');

        $attr = $request->validate([
            'name' => ['required', 'string', 'min:3'],
        ]);

        $attr['slug'] = Str::slug($request->name);
        Category::create($attr);

        return redirect(route('categories.index'))->with('success', 'Add category successfully.');
    }

    public function edit(Category $category)
    {
        $this->authorize('authorizeCategory');

        return view('categories.edit', [
            'category' => $category,
            'submit' => 'Update Category',
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('authorizeCategory');

        $attr = $request->validate([
            'name' => ['required', 'string', 'min:3'],
        ]);

        $category->update($attr);

        return redirect(route('categories.index'))->with('success', 'Update category successfully.');
    }

    public function destroy(Category $category)
    {
        $this->authorize('authorizeCategory');

        if ($category->books()->exists()) {
            return back()->with('error', 'Cannot delete a category, because it is being used by a book.');
        }

        $category->delete();
        return redirect(route('categories.index'))->with('success', 'Delete category successfully.');
    }

}
