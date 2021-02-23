@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                        <li class="breadcrumb-item active text-capitalize"><a href="{{ route('tag.index') }}">Tag
                                List</a></li>
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-2 bg-gradient-indigo">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Create Tag</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <form action="{{ route('tag.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="tag">Tag Name</label>
                                        <input type="text" name="tag"
                                            class="form-control @error('tag') is-invalid @enderror" id="tag"
                                            aria-describedby="emailHelp">
                                        @error('tag')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-2 bg-gradient-indigo">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Tags</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $key => $tag)
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td class="text-right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('tag.edit', $tag->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    @role('supper-admin')
                                                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input class="btn btn-danger" type="submit" name="submit"
                                                            value="Delete">
                                                    </form>
                                                    @endrole
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
