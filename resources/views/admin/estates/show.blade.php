@extends('metronic') @section('content')
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

<img width="100%" alt="user" src="{{asset('image/'.$estate->image)}}">

<!-- BEGIN ROW -->
<div class="row">
    <div class="col-md-12 col-sm-12 margin-top-20">
        <div class="portlet yellow-crusta box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>بيانات العقار</div>
                <div class="actions">
                    <a href="{{route('estates.edit', $estate->id)}}" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> تعديل </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name"># :</div>
                    <div class="col-md-7 value"> {{$estate->id}}</div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> المنطقه : </div>
                    <div class="col-md-7 value"> {{$estate->area->name}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> المالك : </div>
                    <div class="col-md-7 value"> {{$estate->user->name}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> المبلغ : </div>
                    <div class="col-md-7 value"> {{$estate->price}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> الحالة : </div>
                    <div class="col-md-7 value"> @if($estate->status == 1)
                        <span class="label label-sm label-success"> متوفر </span>
                        @endif @if($estate->status == 0)
                        <span class="label label-sm label-danger"> غير متوفر </span>
                        @endif 
                    </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> الوصف : </div>
                    <div class="col-md-7 value"> {{$estate->description}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> العرض : </div>
                    <div class="col-md-7 value"> {{$estate->type}} </div>
                </div>

            </div>
        </div>
    </div>

    @endsection