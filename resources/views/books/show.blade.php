<x-app-layout title="Book Detail">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $book->book_title }}</h1>


                <div class="d-flex justify-content-between">
                    <div class="text-secondary mb-3">
                        <a href="{{ route('categories.show', $book->category->slug) }}">{{ $book->category->name }}</a>
                        <span>&middot; {{ $book->created_at->format('d F, Y') }}</span>

                        <div class="d-flex align-items-center my-3">
                            <div class="flex-shrink-0">
                                <img src="{{ $book->user->gravatar() }}" class="rounded-circle" alt="Profile"
                                    width="60">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div>
                                    {{ $book->user->name }}
                                </div>
                                {{ '@' . $book->user->username }}
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div>
                            <a href="{{ asset('storage/' . $book->book_file) }}" target="_blank"
                                class="btn btn-success me-2">Read Book</a>
                        </div>


                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete book data?')">Delete
                            </button>
                        </form>
                    </div>
                </div>


                <div class="row mb-5 mt-4">
                    <div class="col-md-4">
                        <img class="rounded" style="width: 400px; object-fit: cover; object-position: center;"
                            src="{{ $book->takeBookCover }}" alt="Book Cover">
                    </div>

                    <div class="col-md-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Book Title</td>
                                    <td> : {{ $book->book_title }}</td>
                                </tr>

                                <tr>
                                    <td>Book Category</td>
                                    <td> : {{ $book->category->name }}</td>
                                </tr>

                                <tr>
                                    <td>Book Quantity</td>
                                    <td> : {{ $book->book_quantity }} books</td>
                                </tr>

                                <tr>
                                    <td>Book Description</td>
                                    <td> : </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="mt-3">
                            {!! nl2br($book->book_description) !!}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
