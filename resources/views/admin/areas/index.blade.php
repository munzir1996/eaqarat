@extends('metronic')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}"> @endsection
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
            <a href="{{route('areas.index')}}">المناطق</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> المناطق </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول المناطق</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_area"> أضافة منطقه
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="areas-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>الأسم</th>
                        <th>المربع</th>
                        <th>النوع</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($areas as $area)
                <tbody>
                    <tr>
                        <td>{{$area->id}}</td>
                        <td>{{$area->name}}</td>
                        <td>{{$area->block}}</td>
                        <td>{{$area->type->name}}</td>
                        <td>
                            <form action="{{route('areas.destroy', $area->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('areas.edit', $area->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit"> تعديل </i>
                                </a>

                                <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit">حذف</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- END TABLE -->
    </div>
</div>
<!-- END DATATABLE -->

<!-- BEGIN ADD_AREA MODEL -->
<div class="modal fade in" id="add_area">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة منطقه</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('areas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>الأسم</label>
                        <input type="text" name="name" class="form-control" placeholder="الأسم" required>
                    </div>
                    <div class="form-group">
                        <label>المربع</label>
                        <input type="text" name="block" class="form-control" placeholder="المربع" number required>
                    </div>
                    <div class="form-group">
                        <label>النوع</label>
                        <select name="type_id" class="form-control">
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>        
                            @endforeach
                        </select>
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
        $('#ares-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->