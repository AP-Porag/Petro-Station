@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
                        <li class="breadcrumb-item active text-capitalize">Tag List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-2">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Tag List</h3>
                                <a href="{{route('tag.create')}}" class="btn btn-outline-secondary">Create Tag</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-hover text-nowrap table-striped">
                                <thead class="bg-gradient-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($tags->count())
                                @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>13</td>
                                    <td>{{ Illuminate\Support\Str::limit($tag->description, 100) }}</td>
                                    <td class="text-center d-flex">
                                        <a href="{{route('tag.show',[$tag->id])}}" class="btn btn-info btn-sm mr-3"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-warning btn-sm mr-3"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('tag.destroy',[$tag->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="alert alert-default-info text-indigo text-center">
                                            <h5>No Tag found</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
