@extends('index')

@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>البحث</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Small Breadcrumb -->
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <ul>
                <li>
                    <a href="{{route('home')}}">الصفحة الرئيسية</a>
                </li>
                <li>
                    <a href="#">البحث</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->


<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">

                <!-- Middle Content Area -->
                <!-- Row -->
                <div class="row">
                    <!-- Sorting Filters -->
                    <!-- Sorting Filters Breadcrumb -->
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="clearfix"></div>
                        <div class="listingTopFilterBar">
                            <div class="col-md-7 col-xs-12 col-sm-4 no-padding">
                                <ul class="filterAdType">
                                    <li><a href="{{route('eaqars.show', Auth::user()->id)}}">كل</a>
                                    </li>
                                    <li><a href="{{route('eaqars.sale', Auth::user()->id)}}">بيع</a> </li>
                                    <li class="active"><a href="#">أيجار</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Sorting Filters Breadcrumb End -->
                    <!-- Sorting Filters End-->
                    <div class="clearfix"></div>

                    <!-- Estates -->
                    <div class="posts-masonry">
                        
                    @foreach($estates as $estate)
                        <!-- Listing Eaqar Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="white category-grid-box-1 ">
                                <!-- Image Box -->
                                <div class="image">
                                    <img src="{{asset('image/'.$estate->image)}}" class="img-responsive">
                                    <div class="featured-ribbon">

                                    </div>
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 ">
                                    <!-- Area -->
                                    <div class="category-title"> <span><a href="#">{{$estate->type}}</a></span>
                                    </div>
                                    <!-- Name -->
                                    <h3>
                                        <a title="" href="#">{{$estate->user->name}}</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> {{$estate->area->name}}
                                    </p>
                                    <!-- Details -->
                                    <a href="#" class="btn btn-light">تفاصيل</a>
                                    <!-- Price -->
                                    <span class="ad-price">{{$estate->price}} جنية</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="ad-info-1">
                                    <ul>
                                        <li>
                                            <i class="fa fa-eye"></i>{{$estate->comments->count()}}
                                            التعليقات
                                        </li>
                                        <li> <i class="fa fa-clock-o"></i>
                                            {{ date('M j, Y ',strtotime($estate->created_at)) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                    </div>
                    <!-- Eaqar Archive End -->
                    <div class="clearfix"></div>
                    <!-- Pagination -->
                    <div class="text-center margin-top-30">
                        <ul class="pagination ">
                            {!! $estates->render() !!}
                        </ul>
                    </div>
                    <!-- Pagination End -->
                </div>
                <!-- Row End -->



            @endsection