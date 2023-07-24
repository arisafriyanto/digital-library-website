<x-app-layout title="Update category">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card mb-5">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">Update category</h3>
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('put')
                            @include('categories._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
