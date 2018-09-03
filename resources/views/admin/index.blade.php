@extends('metronic')


@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
    
</div>
<!-- title -->
<h3 class="page-title"> لوحة التحكم
    <small>احصائيات &amp; لوحة التحكم</small>
</h3>
<!-- Counter -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$comments->count()}}">{{$comments->count()}}</span>
                </div>
                <div class="desc"> التعليقات  </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                <span data-counter="counterup" data-value="{{$estates->count()}}">{{$estates->count()}}</span>
                </div>
                <div class="desc"> العقارات </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> +
                    <span data-counter="counterup" data-value="{{$users->count()}}">{{$users->count()}}</span>
                </div>
                <div class="desc"> العملاء </div>
            </div>
        </a>
    </div>
</div>

@endsection

