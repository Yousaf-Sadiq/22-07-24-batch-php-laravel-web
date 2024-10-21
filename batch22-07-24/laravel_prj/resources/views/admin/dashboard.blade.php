@extends('layout.admin.app')

@section('admin_content')
    @php
        $data = [
            'PageName' => 'Dashboard',
            'subPageName' => 'ADMIN',
            'icons' => "<i class='bx bx-home-alt'></i>",
        ];
    @endphp

    @include('layout.admin.components._brudcrumbs', $data)




    <div class="form-body mt-4">
        {{-- <form action="{{ route('upload.admin') }}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="profile" id="">
            @error('profile')
                {{ $message }}
            @enderror
            <button type="submit"> UPLOAD</button>
        </form> --}}

        {{-- <img src="{{asset("upload/admin/3HCXr_Chaicon 2025.jpg")}}" alt=""> --}}

        <form class="row g-3" action="{{ route('admin.dashboard.post') }}" method="POST">
            @csrf
            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">User name</label>
                <input type="text" class="form-control" name="user_name" id="inputEmailAddress"
                    placeholder="jhon@example.com">
                @error('user_name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="Email" id="inputEmailAddress"
                    placeholder="jhon@example.com">
                @error('Email')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="pswd" class="form-control border-end-0" id="inputChoosePassword"
                        value="12345678" placeholder="Enter Password">
                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                    @error('pswd')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">

                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                </div>
            </div>
            <div class="col-md-6 text-end"> <a href="auth-boxed-forgot-password.html">Forgot Password ?</a>
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </div>

            {{-- <div class="col-12">
                <div class="text-start">
                    <p class="mb-0">Don't have an account yet? <a href="auth-boxed-register.html">Sign up here</a>
                    </p>
                </div>
            </div> --}}
        </form>


    </div>

    {{-- {{dd($adminData)}} --}}
    <div class="table-responsive m-5">
        <table class="table table-dark table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User name</th>
                    <th scope="col">Email</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminData as $data)
                    <tr class="">
                        <td scope="row">{{ $data->admin_id }}</td>
                        <td>{{ $data->Username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('admin.dashboard.update', $data->admin_id) }}" class="btn btn-md btn-info">
                                update</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
        {{-- http://127.0.0.1:8000/admin/dashboard?page=2 --}}
        {{ $adminData->links('pagination::myPagination') }}
    </div>
@endsection
