@extends('layouts.admin')

@section('module')
    Purchase
@endsection

@section('before-path')
    Dashboard
@endsection

@section('title')
    Purchase-List
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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <style>
        .vendor{
            margin-top: 6px;
        }
        .select2-container{
            width: 100% !important;
        }
        .select2-container .select2-selection--single{
            height: auto;
        }
        .select2-container--default .select2-selection--single{
            padding-top: 4px;
            padding-bottom: 4px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b{
            margin-top: 2px;
        }
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
                                    <th>Purchase Receipt</th>
                                    <th>product Name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Unit-Price</th>
                                    <th>Payed-by</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td class="text-capitalize">{{$purchase->vendor->name}}</td>
                                        <td class="text-capitalize">{{$purchase->purchase_receipt}}</td>
                                        <td class="text-capitalize">{{$purchase->product->name}}</td>
                                        <td class="text-capitalize">{{$purchase->quantity}}</td>
                                        <td class="text-capitalize">{{$purchase->amount}}</td>
                                        <td class="text-capitalize">{{$purchase->unit_price}}</td>
                                        <td class="text-capitalize">{{$purchase->payed_by}}</td>
                                        <td class="text-capitalize">{{$purchase->notes}}</td>
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
                                                           data-target=".edit-modal-lg-{{$purchase->id}}">
                                                            <ul class="list-group">
                                                                <li class="d-flex align-items-center pl-3 pt-2 pb-2">
                                                                    <i class="fa fa-edit mr-3"><span
                                                                            class="ml-3 text-capitalize">Edit</span></i>
                                                                </li>
                                                            </ul>
                                                        </a>
                                                    </div>
                                                    <div class="text-center action_btn">
                                                        <a href="{{ route('delete-purchase', $purchase->id)}}" class="text-decoration-none text-danger">
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
                                            <div class="modal fade edit-modal-lg-{{$purchase->id}}" tabindex="-1" role="dialog"
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
                                                                <form action="{{route('purchase.update',$purchase->id)}}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="company" class="col-form-label">Company</label>
                                                                                <input type="text" class="form-control" id="company" name="company"
                                                                                       value="{{$purchase->company}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="name" class="col-form-label">Name</label>
                                                                                <input type="text" class="form-control" id="name" name="name"
                                                                                       value="{{$purchase->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="email" class="col-form-label">Email</label>
                                                                                <input type="text" class="form-control" id="email" name="email"
                                                                                       value="{{$purchase->email}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="phone" class="col-form-label">Phone Number</label>
                                                                                <input type="text" class="form-control" id="phone" name="phone"
                                                                                       value="{{$purchase->phone_number}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="notes" class="text-left">Notes</label>
                                                                                <input type="text" class="form-control" id="notes" name="notes"
                                                                                       value="{{$purchase->notes}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-block btn-outline-warning">Update
                                                                                    Purchase
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
                    {{$purchases->links()}}
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
                            <form action="{{route('purchase.store')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="col-form-label">Date</label>
                                            <input type="text" class="form-control" id="date" name="date" value="{{Carbon\Carbon::now()->addDay()->format('M-d-Y')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vendor" class="vendor">Company</label>
                                            <div class="form-group">
                                                <select class="custom-select w-100" name="company" id="vendor">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}" class="form-control text-capitalize">{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vendor" class="vendor">Product</label>
                                            <div class="form-group">
                                                <select class="custom-select w-100" name="company" id="product">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}" class="form-control text-capitalize">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity" class="col-form-label">Quantity</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity"
                                                   placeholder="Write quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount" class="col-form-label">Amount</label>
                                            <input type="text" class="form-control input" id="amount" name="amount"
                                                   placeholder="Write amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit_price" class="col-form-label">Unit Price</label>
                                            <input type="text" class="form-control input" id="unit_price" name="unit_price"
                                                   placeholder="0" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="payed_by_div">
                                        <div class="form-group">
                                            <label for="company" class="col-form-label">Payed By</label>
                                            <select class="form-control" name="company" id="payed_by">
                                                <option value="1">Cash</option>
                                                <option value="2">Account</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="" id="check_number_div"></div>
                                    <div class="col-md-6" id="purchase_receipt_div">
                                        <div class="form-group">
                                            <label for="purchase_receipt" class="col-form-label">Purchase Receipt</label>
                                            <input type="text" class="form-control" id="purchase_receipt" name="purchase_receipt"
                                                   placeholder="If Any purchase receipt !!">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="notes" class="col-form-label">Notes</label>
                                            <input type="text" class="form-control" id="notes" name="notes"
                                                   placeholder="If Any Note !!">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="notes" class="col-form-label">attachment</label>
                                            <input type="file" class="form-control" id="notes" name="notes"
                                                   placeholder="If Any Note !!">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-outline-success">Save
                                                Purchase
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
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $('#vendor').select2({
                    placeholder: 'Select an option'
                });
                $('#product').select2({
                    placeholder: 'Select an option'
                });

                $(document).on('change', '#payed_by', function () {
                    var payed_by = $(this).val();
                    console.log('Payed By'+payed_by)

                    if (payed_by == 2){
                        $('#payed_by_div').removeClass('col-md-6').addClass('col-md-4')
                        $('#purchase_receipt_div').removeClass('col-md-6').addClass('col-md-4')
                        $('#check_number_div').addClass('col-md-4').append('<div class="form-group" id="card_number_div">'+
                        '<label for="card_number" class="col-form-label">Card OR Account No.</label>'+
                        '<input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card / Account No. !!">'+
                        '</div>')
                    }else {
                        $('#payed_by_div').addClass('col-md-6').removeClass('col-md-4')
                        $('#purchase_receipt_div').addClass('col-md-6').removeClass('col-md-4')
                        $('#check_number_div').removeClass('col-md-4')
                        $('#card_number_div').remove();
                    }
                });

                $(document).ready(function(){
                    $(".input").keyup(function(){
                        var quantity = +$("#quantity").val();
                        console.log(quantity)
                        var amount = +$("#amount").val();
                        var unit_price =( amount / quantity).toFixed(3);
                        $("#unit_price").val(unit_price);
                    });
                });

                $(document).on('click', '#date', function () {
                    console.log('Payed By'+payed_by)

                    if (payed_by == 2){
                        $('#payed_by_div').removeClass('col-md-6').addClass('col-md-4')
                        $('#purchase_receipt_div').removeClass('col-md-6').addClass('col-md-4')
                        $('#check_number_div').addClass('col-md-4').append('<div class="form-group" id="card_number_div">'+
                            '<label for="card_number" class="col-form-label">Card OR Account No.</label>'+
                            '<input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card / Account No. !!">'+
                            '</div>')
                    }else {
                        $('#payed_by_div').addClass('col-md-6').removeClass('col-md-4')
                        $('#purchase_receipt_div').addClass('col-md-6').removeClass('col-md-4')
                        $('#check_number_div').removeClass('col-md-4')
                        $('#card_number_div').remove();
                    }
                });

            </script>
@endsection
