@extends('metronic')
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

<h3 class="page-title">تعديل المنطقه </h3>

<form action="{{ route('areas.update', $area->id) }}" method="POST">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
        <label>الأسم</label>
        <input type="text" name="name" class="form-control" value="{{$area->name}}" placeholder="الأسم" required>
    </div>
    <div class="form-group">
        <label>المربع</label>
        <input type="text" name="block" class="form-control" value="{{$area->block}}" placeholder="المربع" number required>
    </div>
    <div class="form-group">
        <label>النوع</label>
        <select name="type_id" class="form-control">
            @foreach($types as $type)
        <option value="{{$type->id}}" {{ $type->id == $area->type_id ? 'selected' : '' }}>{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="margin-top-10">
        <button type="submit" class="btn green"> حفظ التعديل </button>
    </div>
</form>

@endsection