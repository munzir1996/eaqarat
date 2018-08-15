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
            <a href="{{route('rates.index')}}">التقييم</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title">تعديل التقييم </h3>

<form action="{{ route('rates.update', $rate->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label>النوع</label>
                <input type="text" name="rate" class="form-control" placeholder="{{$rate->rate}}"
                 value="{{$rate->rate}}" required> 
            
        </div>
        <div class="margin-top-10">
            <button type="submit" class="btn green"> حفظ التعديل </button>
        </div>
    </form>

@endsection