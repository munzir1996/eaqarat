@extends('metronic') @section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('complains.index')}}">الشكاوي</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<!-- BEGIN ROW -->
<div class="row">
    <div class="col-md-12 col-sm-12 margin-top-20">
        <div class="portlet yellow-crusta box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>بيانات الشكوة
                </div>
            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name"># :</div>
                    <div class="col-md-7 value"> {{$complain->id}}</div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> الأسم : </div>
                    <div class="col-md-7 value"> {{$complain->name}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> البريد الألكتروني : </div>
                    <div class="col-md-7 value"> {{$complain->email}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name">العنوان : </div>
                    <div class="col-md-7 value"> {{$complain->address}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> رقم الهاتف : </div>
                    <div class="col-md-7 value"> {{$complain->phone}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> الشكوة : </div>
                    <br>
                    <br>
                    <div class="col-md-7 value"> {{$complain->complain}} </div>
                </div>

            </div>
        </div>
    </div>

    @endsection