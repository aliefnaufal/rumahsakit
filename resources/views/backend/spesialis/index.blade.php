@extends('layouts.backend')

@section('backend_dashboard')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Spesialis</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>List Spesialis</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('spesialis.create') }}" class="btn btn-primary float-right">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1
                            @endphp
                            @foreach($data as $spesialis)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$spesialis->name}}</td>
                                    <td>
                                        <a href="{{Route('spesialis.edit', $spesialis->id)}}">Edit</a>
                                        <a href="{{Route('spesialis.delete', $spesialis->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @php
                                $no++
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
