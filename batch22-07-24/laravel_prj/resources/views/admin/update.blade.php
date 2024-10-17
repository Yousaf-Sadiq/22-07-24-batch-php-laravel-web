@extends('layout.admin.app')

@section('admin_content')
    @php
        $data = [
            'PageName' => 'Dashboard',
            'subPageName' => 'ADMIN UPDATE',
            'icons' => "<i class='bx bx-home-alt'></i>",
        ];
    @endphp

    @include('layout.admin.components._brudcrumbs', $data)




    <div class="form-body mt-4">
        <form class="row g-3" action="{{ route('admin.dashboard.update.post') }}" method="POST">
            @csrf

            <input type="text" value="{{ $admin->admin_id }}" name="adminId">

            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">User name</label>
                <input type="text" value="{{ $admin->Username }}" class="form-control" name="user_name"
                    id="inputEmailAddress" placeholder="jhon@example.com">
                @error('user_name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email</label>
                <input type="email" value="{{ $admin->email }}" class="form-control" name="Email" id="inputEmailAddress"
                    placeholder="jhon@example.com">
                @error('Email')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="text" value="{{ decrypt($admin->ptoken) }}" name="pswd"
                        class="form-control border-end-0" id="inputChoosePassword" value="12345678"
                        placeholder="Enter Password">
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
@endsection