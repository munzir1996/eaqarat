@extends('metronic')
@section('title', ' جدول العقارات') 
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
            <a href="{{route('estates.index')}}">العقارات</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> العقارات </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول العقارات</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_estate"> أضافة عقار
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="estates-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>المنطقه</th>
                        <th>المالك</th>
                        <th>التكلفة</th>
                        <th>الحالة</th>
                        <th>العرض</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach($estates as $estate)
                    <tr>
                        <td>{{$estate->id}}</td>
                        <td>{{$estate->area->name}}</td>
                        <td>{{$estate->user->name}}</td>
                        <td>{{$estate->price}}</td>
                        <td>
                            @if($estate->status == 1)
                            <span class="label label-sm label-success"> متوفر </span>
                            @endif @if($estate->status == 0)
                            <span class="label label-sm label-danger"> غير متوفر </span>
                            @endif
                        </td>
                        <td>{{$estate->type}}</td>
                        <td>
                            <form action="{{route('estates.destroy', $estate->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('estates.show', $estate->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-share"> عرض </i>
                                </a>
                                <a href="{{route('estates.edit', $estate->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
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

<!-- BEGIN ADD_USER MODEL -->
<div class="modal fade in" id="add_estate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة عقار</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('estates.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>المنطقه</label>
                        <select name="area_id" class="form-control">
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>المالك</label>
                        <select name="user_id" class="form-control">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label>النوع</label>
                            <select name="type_id" class="form-control">
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <label>السعر</label>
                        <input type="text" name="price" class="form-control" placeholder="السعر" number required>
                    </div>
                    <div class="form-group">
                        <label>العرض</label>
                        <select name="type" class="form-control" name="status">
                            <option value="بيع">بيع</option>
                            <option value="أيجار">أيجار</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label>وصف</label>
                        <input type="text" name="description" class="form-control" placeholder="وصف" required>
                    </div>
                    <label>صورة</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input id="image" type="file" name="image">
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
<!-- BEGIN ADD_USER MODEL -->

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
        $('#estates-table').DataTable({
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
            filterDropDown: {									
					columns: [
                    {
                        idx: 1
                    },
                    {
                        idx: 5
                    },
						
					],
                    bootstrap: true
				}
        });
    });
    
    $('.fileinput').fileinput()
</script>
@endsection
<!-- END SCRIPTS -->