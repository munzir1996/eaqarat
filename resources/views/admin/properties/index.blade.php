@extends('metronic')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" />
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
            <a href="{{route('properties.index')}}">التمليك</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> التمليك </h3>

<form action="{{ route('property.title') }}" method="POST">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
        <label>حدد نوع التمليك</label>
        <input type="text" name="name" class="form-control" value=" {{$title->name}} " placeholder="حدد نوع التمليك" required>
        <br>
        <button type="submit" class="btn btn-outline sbold green">تحديد</button>
    </div>
</form>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول التمليك</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_property"> أضافة تمليك
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="properties-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>الأسم</th>
                        <th>تاريخ التعين</th>
                        <th>العمر</th>
                        <th>القبول</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($properties as $property)
                    <tr>
                        <td>{{$property->id}}</td>
                        <td>{{$property->name}}</td>
                        <td>{{$property->hire_date}}</td>
                        <td>{{$property->age}}</td>
                        <td>
                            <form action="{{route('property.result', $property->id)}}" method="post">
                                @csrf
                                @if($property->type == 0)
                                <button type="submit" class="btn green btn-sm btn-outline sbold uppercase">
                                    قبول
                                </button>
                                @else
                                <button type="submit" class="btn yellow btn-sm btn-outline sbold uppercase">
                                    رفض
                                </button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form action="{{route('properties.destroy', $property->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('properties.show', $property->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-share"> عرض </i>
                                </a>
                                <a href="{{route('properties.edit', $property->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
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

<!-- BEGIN ADD_PROPERTY MODEL -->
<div class="modal fade in" id="add_property">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة تمليك</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>الأسم</label>
                        <input type="text" name="name" class="form-control" placeholder="الأسم" required>
                    </div>
                    <div class="form-group">
                        <label>تاريخ التعين</label>
                        <input type="text" name="hire_date" class="form-control" placeholder="تاريخ التعين" number
                            required>
                    </div>
                    <div class="form-group">
                        <label>العمر</label>
                        <input type="text" name="age" class="form-control" placeholder="العمر" number required>
                    </div>
                    <!-- FILE UPLOAD -->
                    <label>شهادة مرتب</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input id="salary_pdf" type="file" name="salary_pdf">
                        </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                    <label>أقرار شرعي</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input id="offical_pdf" type="file" name="offical_pdf">
                        </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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
<!-- BEGIN ADD_PROPERTY MODEL -->

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script src="{{asset('vendor/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#properties-table').DataTable();
    });
    $('.fileinput').fileinput()
</script>
@endsection
<!-- END SCRIPTS -->