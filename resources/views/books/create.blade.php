<x-app-layout title="Add book data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card mb-5">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">Add book data</h3>
                        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('books._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
