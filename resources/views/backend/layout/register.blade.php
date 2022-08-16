@extends('layouts.backend_auth')

@section('backend_auth')
<div class="col-lg-12">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="user" action="{{ route('backend.register.post') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="name" class="form-control form-control-user"
                    id="exampleInputName" aria-describedby="emailHelp"
                    placeholder="Enter Your Name..." name="name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email Address..." name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Re-enter Password" name="repassword">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Register
            </button>
        </form>
        <hr>
        <div class="text-center">
            <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('backend.login') }}">Already Have an Account!</a>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            if({{\Session::get('register_fail')}}){
                alert('Akun Gagal Dibuat')
            }
        });
    </script>
@endsection