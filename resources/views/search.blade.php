@extends('index')
<!-- BEGIN CSS -->
@section('stylesheets')
<style>
.top-card-space{
    margin-top: 30px;
}
</style>
@endsection
<!-- END CSS -->

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

                <div class="search-form">
                        <form action="{{ route('search') }}" method="GET">
                            
                            <div class="row">
                                <div class="col-md-4 col-xs-12 col-sm-4">
                                    <!-- Area -->
                                    <select class="category form-control select2-hidden-accessible" name="area_id"
                                         aria-hidden="true">
                                        <option label="Select Option"></option>
                                        @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Input Field -->
                                <div class="col-md-4 col-xs-12 col-sm-4">
                                    <!-- Type -->
                                    <select class="category form-control select2-hidden-accessible" name="type_id"
                                         aria-hidden="true">
                                        <option label="Select Option"></option>
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Search Button -->
                                <div class="col-md-4 col-xs-12 col-sm-4">
                                    <button type="submit" class="btn btn-theme btn-block">بحث
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                <!-- Middle Content Area -->
                <!-- Row -->
                <div class="row">

                    <!-- Estates -->
                    <div class="posts-masonry top-card-space">
                        
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
                                    <a href="{{route('detail', $estate->id)}}" class="btn btn-light">تفاصيل</a>
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