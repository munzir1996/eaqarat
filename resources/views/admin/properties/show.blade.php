@extends('metronic') @section('content')
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

<!-- BEGIN ROW -->
<div class="row">
    <div class="col-md-12 col-sm-12 margin-top-20">
        <div class="portlet yellow-crusta box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>بيانات التمليك</div>
                <div class="actions">
                    <a href="{{route('properties.edit', $property->id)}}" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> تعديل </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row static-info">
                    <div class="col-md-5 name"># :</div>
                    <div class="col-md-7 value"> {{$property->id}}</div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> الأسم : </div>
                    <div class="col-md-7 value"> {{$property->name}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> تاريخ التعين : </div>
                    <div class="col-md-7 value"> {{$property->hire_date}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> العمر : </div>
                    <div class="col-md-7 value"> {{$property->age}} </div>
                </div>
                <div class="row static-info">
                    <div class="col-md-5 name"> شهادة مرتب : </div>
                    <div class="col-md-7 value">
                        <a href="{{asset('file/'.$property->salary_pdf)}}" class="nav-link nav-toggle">
                            <i class="icon-arrow-down"></i>
                            <span class="title">{{$property->salary_pdf}}</span>
                        </a>
                    </div>
                </div>
                    <div class="row static-info">
                        <div class="col-md-5 name"> أقرار شرعي : </div>
                        <div class="col-md-7 value">
                            <a href="{{asset('file/'.$property->offical_pdf)}}" class="nav-link nav-toggle">
                                <i class="icon-arrow-down"></i>
                                <span class="title">{{$property->offical_pdf}}</span>
                            </a>
                        </div>
                    </div>

                
            </div>
        </div>

        @endsection