<x-app-layout title="Add category">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card mb-5">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">Add category</h3>
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            @include('categories._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
