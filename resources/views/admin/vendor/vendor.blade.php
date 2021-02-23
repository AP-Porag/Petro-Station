@extends('layouts.admin')

@section('module')
    Vendor
@endsection

@section('before-path')
    Dashboard
@endsection

@section('title')
    Vendor-List
@endsection

@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active text-capitalize" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <style>
    </style>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-outline-primary text-capitalize mr-3" data-toggle="modal"
                   data-target=".add-modal-lg"><i
                        class="fa fa-plus-circle"></i> Add new @yield('module')</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover">
                                <thead class="text-center">
                                <tr>
                                    <th>Sl.</th>
                                    <th>Company</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$vendor->company}}</td>
                                        <td>{{$vendor->name}}</td>
                                        <td>{{$vendor->email}}</td>
                                        <td>{{$vendor->phone_number}}</td>
                                        <td>{{$vendor->notes}}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                        type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                                                    <div class="text-center action_btn border-bottom pt-1 pb-1">
                                                        <a href="#" class="text-decoration-none text-info"
                                                           data-toggle="modal"
                                                           data-target=".edit-modal-lg-{{$vendor->id}}">
                                                            <ul class="list-group">
                                                                <li class="d-flex align-items-center pl-3 pt-2 pb-2">
                                                                    <i class="fa fa-edit mr-3"><span
                                                                            class="ml-3 text-capitalize">Edit</span></i>
                                                                </li>
                                                            </ul>
                                                        </a>
                                                    </div>
                                                    <div class="text-center action_btn">
                                                        <a href="{{ route('delete-vendor', $vendor->id)}}" class="text-decoration-none text-danger">
                                                        <ul class="list-group">
                                                            <li class="d-flex align-items-center pl-3 pt-2 pb-2">
                                                                    <i class="fa fa-trash mr-3"></i><span class="ml-3 text-capitalize">delete</span>
                                                            </li>
                                                        </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--        edit Modal start--}}
                                            <div class="modal fade edit-modal-lg-{{$vendor->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="mySearchModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="edit-form">
                                                                <form action="{{route('vendor.update',$vendor->id)}}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="company" class="col-form-label">Company</label>
                                                                                <input type="text" class="form-control" id="company" name="company"
                                                                                       value="{{$vendor->company}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="name" class="col-form-label">Name</label>
                                                                                <input type="text" class="form-control" id="name" name="name"
                                                                                       value="{{$vendor->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="email" class="col-form-label">Email</label>
                                                                                <input type="text" class="form-control" id="email" name="email"
                                                                                       value="{{$vendor->email}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="phone" class="col-form-label">Phone Number</label>
                                                                                <input type="text" class="form-control" id="phone" name="phone"
                                                                                       value="{{$vendor->phone_number}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="notes" class="text-left">Notes</label>
                                                                                <input type="text" class="form-control" id="notes" name="notes"
                                                                                       value="{{$vendor->notes}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-block btn-outline-warning">Update
                                                                                    Vendor
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--        edit Modal end--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    {{$vendors->links()}}
                </div>
            </div>
        </div>

        {{--        Modal start--}}
        {{--        store Modal start--}}
        <div class="modal fade add-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="mySearchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="search-form">
                            <form action="{{route('vendor.store')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company" class="col-form-label">Company</label>
                                            <input type="text" class="form-control" id="company" name="company"
                                                   placeholder="Write Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Write Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="Write Company Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   placeholder="Write Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="notes" class="col-form-label">Notes</label>
                                            <input type="text" class="form-control" id="notes" name="notes"
                                                   placeholder="If Any Note !!">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-outline-success">Save
                                                Vendor
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        store Modal end--}}
        {{--        Modal end--}}
        @endsection

        @section('script')

            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
            <script>

            </script>
@endsection
