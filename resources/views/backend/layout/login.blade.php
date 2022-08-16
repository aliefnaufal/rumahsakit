@extends('layouts.backend_auth')

@section('backend_auth')
<div class="col-lg-12">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="user" action="{{ route('backend.login.post') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email Address..." name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
            </button>
        </form>
        <hr>
        <div class="text-center">
            <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('backend.register') }}">Create an Account!</a>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            if({{\Session::get('login_fail')}}){
                alert('Data Tidak Ditemukan')
            }
            else if({{\Session::get('register_success')}}){
                alert('Akun Telah Dibuat, Silahkan Login')
            }
        });
    </script>
@endsection
