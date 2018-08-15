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
            <a href="{{route('types.index')}}">الأنواع</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title">تعديل النوع </h3>

<form action="{{ route('types.update', $type->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label>النوع</label>
                <input type="text" name="name" class="form-control" placeholder="{{$type->name}}"
                 value="{{$type->name}}" required> 
            
        </div>
        <div class="margin-top-10">
            <button type="submit" class="btn green"> حفظ التعديل </button>
        </div>
    </form>

@endsection