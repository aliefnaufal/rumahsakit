@extends('layouts.backend')

@section('backend_dashboard')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Obat</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Obat Edit</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{Route('obat.update')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$data->name}}">
                                <input id="id" type="hidden" class="form-control" name="id" required autofocus value="{{$data->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Kategori</label>

                            <div class="col-md-12">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option <?php if($data->kategori == "Ringan"){ ?> selected="selected" <?php } ?> value="Ringan">Ringan</option>
                                    <option <?php if($data->kategori == "Menengah"){ ?> selected="selected" <?php } ?> value="Menengah">Menengah</option>
                                    <option <?php if($data->kategori == "Keras"){ ?> selected="selected" <?php } ?> value="Keras">Keras</option>
                                </select>
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
