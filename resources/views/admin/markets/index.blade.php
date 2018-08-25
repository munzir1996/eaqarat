@extends('metronic')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
@endsection
<!-- END CSS -->
@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('markets.index')}}">البورصة</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> البورصة </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول البورصة</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_market"> أضافة بورصة
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="markets-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>أسم المنطقه</th>
                        <th>السعر الأبتدائي</th>
                        <th>السعر النهائي</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach($markets as $market)
                    <tr>
                        <td>{{$market->id}}</td>
                        <td>{{$market->area->name}}</td>
                        <td>{{$market->start_price}}</td>
                        <td>{{$market->end_price}}</td>
                        <td>
                            <form action="{{route('markets.destroy', $market->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('markets.edit', $market->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit"> تعديل </i>
                                </a>

                                <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit">حذف</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END TABLE -->
    </div>
</div>
<!-- END DATATABLE -->

<!-- BEGIN ADD_AREA MODEL -->
<div class="modal fade in" id="add_market">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة بورصة</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('markets.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>أسم المنطقه</label>
                        <select name="area_id" class="form-control">
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>        
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>السعر الأبتدائي</label>
                        <input type="text" name="start_price" class="form-control" placeholder="السعر الأبتدائي" number required>
                    </div>
                    <div class="form-group">
                        <label>السعر النهائي</label>
                        <input type="text" name="end_price" class="form-control" placeholder="السعر النهائي" number required>
                    </div>

                    <div class="margin-top-10">
                        <button type="submit" class="btn btn-outline sbold green">أضافة</button>
                        <button type="button" class="btn btn-outline sbold red" data-dismiss="modal">أغلاق</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END ADD_AREA MODEL -->

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#markets-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->