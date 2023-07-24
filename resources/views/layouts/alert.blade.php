@if (session()->has('success'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif
