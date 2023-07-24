<x-app-layout title="{{ $user->name }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center my-3">
                            <div class="flex-shrink-0">
                                <img src="{{ $user->gravatar() }}" class="rounded-circle" alt="Profile" width="80">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div>
                                    <p class="fs-4 m-0">{{ $user->name }}</p>
                                    <p class="fs-6 m-0">{{ '@' . $user->username }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2 mt-4">
                            <div class="col-md-12">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td> : {{ $user->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>E-mail</td>
                                            <td> : {{ $user->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>Username</td>
                                            <td> : {{ $user->username }}</td>
                                        </tr>

                                        <tr>
                                            <td>Role</td>
                                            <td> : {{ $user->access_level }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <form action="{{ route('logout') }}" method="post" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-warning">Logout</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
