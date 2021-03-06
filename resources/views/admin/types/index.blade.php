@extends('metronic')
@section('title', ' جدول الأنواع') 
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
            <a href="{{route('types.index')}}">الأنواع</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> الأنواع </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول الأنواع</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_type"> أضافة نوع
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="types-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>النوع</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach($types as $type)
                    <tr>
                        <td>{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>
                            <form action="{{route('types.destroy', $type->id)}}" method="POST">
                                @csrf 
                                {{ method_field('DELETE') }}
                                <a href="{{route('types.edit', $type->id)}}" 
                                class="btn dark btn-sm btn-outline sbold uppercase">
                                <i class="fa fa-edit"> تعديل </i></a>

                                <button type="submit" 
                                class="btn red btn-sm btn-outline sbold uppercase">
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

<!-- BEGIN ADD_TYPE MODEL -->
<div class="modal fade in" id="add_type">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة نوع</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('types.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>النوع</label>
                        <input type="text" name="name" class="form-control" placeholder="النوع" required>
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
<!-- END ADD_TYPE MODEL -->

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#types-table').DataTable({
            dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                messageTop: 'This print was produced using the Print button for DataTables',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        });
    });
</script>
@endsection
<!-- END SCRIPTS -->