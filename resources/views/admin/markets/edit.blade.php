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
            <a href="{{route('markets.index')}}">البورصة</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title">تعديل البورصة </h3>

<form action="{{ route('markets.update', $market->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>أسم المنطقه</label>
            <select name="area_id" class="form-control">
                @foreach($areas as $area)
                <option value="{{$area->id}}" {{ $area->id == $market->area_id ? 'selected' : '' }}>{{$area->name}}</option>        
                @endforeach
            </select>
            
        </div>
        <div class="form-group">
            <label>السعر الأبتدائي</label>
        <input type="text" name="start_price" class="form-control" value="{{$market->start_price}}" placeholder="السعر الأبتدائي" number required>
        </div>
        <div class="form-group">
            <label>السعر النهائي</label>
            <input type="text" name="end_price" class="form-control" value="{{$market->end_price}}" placeholder="السعر النهائي" number required>
        </div>
        
        <div class="margin-top-10">
            <button type="submit" class="btn green"> حفظ التعديل </button>
        </div>
    </form>

@endsection