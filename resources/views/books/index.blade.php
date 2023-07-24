<x-app-layout title="Books">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-4">
                        @isset($category)
                            <h2>Category: {{ $category->name }}</h2>
                        @else
                            <h2>All Books</h2>
                        @endisset
                    </div>

                    <div class="pt-3">
                        <a href="{{ route('books.export.excel') }}" target="_blank" class="btn btn-success mx-2">Export to
                            Excel</a>
                        <a href="{{ route('books.export.pdf') }}" target="_blank" class="btn btn-warning">Export to
                            Pdf</a>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-4">
                    <div>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            Add Book Data
                        </a>
                    </div>

                    <div class="d-flex">
                        <form action="{{ route('search.book') }}" method="get" class="d-flex me-3" role="search">
                            <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                        <form action="{{ route('books.index') }}" method="get" class="d-flex">
                            <select name="filter_book" id="filter_book" class="form-select me-2">
                                <option disabled selected>All Books</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-success" type="submit">Filter</button>
                        </form>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: #e3f2fd;">
                                <th class="fw-semibold text-center">No.</th>
                                <th class="fw-semibold">Title</th>
                                <th class="fw-semibold">Category</th>
                                <th class="fw-semibold">Description</th>
                                <th class="fw-semibold text-center">Quantity</th>
                                <th class="fw-semibold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $index => $book)
                                <tr class="align-middle">
                                    <td class="text-center">{{ $index + $books->firstItem() }}.</td>
                                    <td>{{ $book->book_title }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ Str::limit($book->book_description, 40, '') }}</td>
                                    <td class="text-center">{{ $book->book_quantity }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @can('authorizeBook', $book)
                                                <a href="{{ route('books.show', $book->id) }}"
                                                    class="btn btn-secondary me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-primary me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete book data?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash3"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 mb-5">
                    {{ $books->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
