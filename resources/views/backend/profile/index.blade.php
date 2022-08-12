@extends('layouts.backend')

@section('backend_dashboard')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Your Profile</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{Route('profile.update_profile')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" required readonly autofocus value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Bio</label>

                            <div class="col-md-12">
                                <!-- <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$user->name}}"> -->
                                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-12">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    <option value="non_binary_option">Non Binary Option</option>
                                </select>
                                <!-- <input id="name" type="file" class="form-control" name="name" required autofocus value="{{$user->name}}"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Foto</label>

                            <div class="col-md-12">
                                <input id="foto" type="file" class="form-control" name="foto" required autofocus accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
