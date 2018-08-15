@extends('metronic') 

<!-- BEGIN CSS -->
@section('stylesheets')
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

<h3 class="page-title">تعديل بيانات التمليك </h3>

<form action="{{ route('properties.update', $property->id) }}" method="POST">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
            <label>الأسم</label>
    <input type="text" name="name" class="form-control" value="{{$property->name}}" placeholder="الأسم" required>
        </div>
        <div class="form-group">
            <label>تاريخ التعين</label>
            <input type="text" name="hire_date" class="form-control" value="{{$property->hire_date}}" placeholder="تاريخ التعين" number required>
        </div>
        <div class="form-group">
            <label>العمر</label>
            <input type="text" name="age" class="form-control" value="{{$property->age}}" placeholder="العمر" number required>
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
                <input id="salary_pdf" type="file" name="salary_pdf" value="{{$property->salary_pdf}}">
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
                <input id="offical_pdf" type="file" name="offical_pdf" value="{{$property->offical_pdf}}">
            </span>
            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    <div class="margin-top-10">
        <button type="submit" class="btn green"> حفظ التعديل </button>
    </div>
</form>

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{asset('vendor/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    $('.fileinput').fileinput()
</script>
@endsection
<!-- END SCRIPTS -->