@extends('metronic')

<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" /> @endsection
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

<h3 class="page-title">تعديل بيانات العقار </h3>

<form action="{{ route('estates.update', $estate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
        <label>المنطقه</label>
        <select name="area_id" class="form-control">
            @foreach($areas as $area)
            <option value="{{$area->id}}" {{ $area->id == $estate->area_id ? 'selected' : '' }}>{{$area->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>المالك</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
            <option value="{{$user->id}}" {{ $user->id == $estate->user_id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>النوع</label>
        <select name="type_id" class="form-control">
            @foreach($types as $type)
            <option value="{{$type->id}}" {{ $type->id == $estate->type_id ? 'selected' : '' }}>{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>السعر</label>
        <input type="text" name="price" class="form-control" value="{{$estate->price}}" placeholder="السعر" number required>
    </div>
    <div class="form-group">
        <label>العرض</label>
        <select name="type" class="form-control" name="status">
            <option value="بيع" {{ $estate->type == 'بيع' ? 'selected' : '' }}>بيع</option>
            <option value="أيجار" {{ $estate->type == 'أيجار' ? 'selected' : '' }}>أيجار</option>
        </select>
    </div>
    <div class="form-group">
        <label>العرض</label>
        <select name="type" class="form-control" name="status">
            <option value="1" {{ $estate->status == 1 ? 'selected' : '' }}>متوفر</option>
            <option value="0" {{ $estate->status == 0 ? 'selected' : '' }}>غير متوفر</option>
        </select>
    </div>
    <div class="form-group">
        <label>وصف</label>
        <input type="text" name="description" class="form-control" value="{{$estate->description}}" placeholder="وصف" required>
    </div>
    <!-- IMAGE -->
    <label>صورة</label>
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="glyphicon glyphicon-file fileinput-exists"></i>
            <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" id="image" name="image">
        </span>
        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
    <!-- END IMAGE -->
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