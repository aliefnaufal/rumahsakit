@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @include('backend.layout.menus')
                </div>

                <div class="panel-body">
                    <h3>
                        Berhasil Login
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection