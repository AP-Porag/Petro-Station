@extends('layouts.admin')

@section('module')
    Vendor
@endsection

@section('before-path')
    Vendor-List
@endsection

@section('title')
    Add new Vendor
@endsection

@section('breadcumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('vendor.index') }}">@yield('before-path')</a>
            </li>
            <li class="breadcrumb-item active text-capitalize" aria-current="page">@yield('title')</li>
        </ol>
    </nav>
@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-end">
                    <a href="{{ route('vendor.index') }}" class="btn btn-sm btn-outline-primary"><i
                            class="fa fa-list"></i>@yield('before-path')</a>
                </div>
                <div class="card-body">
                    <div class="form">
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
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        var loader = $('#loader');
        var subcategory = $('#subcategory');
        loader.hide();
        subcategory.attr('disabled','disabled');

        $('#preview').attr('src', '{{asset('storage/no-image/upload-image.png')}}');

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#thumbnail").change(function () {
            readURL(this);
        });

        //doctor fees load according selected doctor
        $(document).on('change', '#category', function () {
            var category_id = $(this).val();

            console.log('Category ID - ' + category_id);

            if (category_id){
                loader.show();
                subcategory.attr('disabled','disabled');

                $.ajax({
                    type: 'get',
                    url: '/admin/Vendor/get/subcategory',
                    data: {'category_id': category_id},
                    dataType: 'json',//return data will be json
                    success: function (data) {
                        console.log(data)
                        var select = '<option selected disabled>--Select Sub-Category--</option>';

                        data.forEach(function (row){
                            select += '<option value="'+row.id+'">'+row.name+'</option>';
                        });

                        if (!$.trim(data)){
                            subcategory.attr('disabled','disabled');
                            loader.hide();
                        }
                        else{
                            subcategory.removeAttr('disabled');
                            subcategory.html(select);
                            loader.hide();
                        }




                    },
                    error: function () {

                    }
                });
            }



        });

    </script>
    <script>
        $(document).ready(function () {
            $('#Vendor_tag').select2();
        });
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
        CKEDITOR.on('instanceReady', function (ev) {
            ev.editor.dataProcessor.htmlFilter.addRules( {
                elements : {
                    img: function( el ) {
                        // Add bootstrap "img-responsive" class to each inserted image
                        el.addClass('img-fluid');

                        // Remove inline "height" and "width" styles and
                        // replace them with their attribute counterparts.
                        // This ensures that the 'img-responsive' class works
                        var style = el.attributes.style;

                        if (style) {
                            // Get the width from the style.
                            var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                width = match && match[1];

                            // Get the height from the style.
                            match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                            var height = match && match[1];

                            // Replace the width
                            if (width) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');

                            }

                            // Replace the height
                            if (height) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');

                            }
                        }

                        // Remove the style tag if it is empty
                        if (!el.attributes.style)
                            delete el.attributes.style;
                    }
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                "ajax": {
                    "url": "/admin/Vendor/get/tags",
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "Vendors_count"},
                ]
            });
        });
    </script>

@endsection
