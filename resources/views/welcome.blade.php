@extends('index') @section('content')

<div class="background-rotator">
    <!-- slider start-->
    <div class="owl-carousel owl-theme  owl-rtl owl-responsive-1000 owl-loaded">

        <div class="owl-stage-outer">
            <img src="{{asset('image/buildings.jpg')}}" alt="">
        </div>
    </div>
    <div class="search-section">
        <!-- Find search section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading -->
                    <div class="content">
                        <div class="heading-caption">
                            <h1>أبحث عن عقار</h1>
                        </div>
                        <div class="search-form">
                            <form action="{{ route('search') }}" method="GET">
                                
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <!-- Area -->
                                        <label for="area">المنطقه</label>
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
                                        <label for="area">النوع</label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Find search section-->
</div>

<!-- =-=-=-=-=-=-= How It Work =-=-=-=-=-=-= -->

<section class="section-padding white">
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Heading Area -->
            <div class="heading-panel">
                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                    <!-- Main Title -->
                    <h1>كيف هو <span class="heading-color"> عمل</span></h1>
                    <!-- Short Description -->
                </div>
            </div>
            <!-- Middle Content Box -->
            <div class="col-xs-12 col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon"> <i class="flaticon-people"></i> </div>
                        <h4>أنشئ حسابك</h4>
                    </div>
                    <div class="how-it-work text-center ">
                        <div class="how-it-work-icon"> <i class="flaticon-people-2"></i> </div>
                        <h4>انشر عقارك مجانا</h4>
                    </div>
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon "> <i class="flaticon-heart-1"></i> </div>
                        <h4>الاتفاق تم</h4>
                    </div>
                </div>
            </div>
            <!-- Middle Content Box End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Main Container End -->
</section>

<!-- =-=-=-=-=-=-= How It Work =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Featured Ad Parallex =-=-=-=-=-=-= -->

<section class="parallex bg-3 featured-ads">
    <div class="container">
        <!-- Container -->
        <div class="container">
            <div class="col-md-8 col-sm-6 no-padding">
                <div class="app-text-section">
                    <h3>مع عقاري</h3>
                    <ul>
                        <li>العثور على العقارات المجاورة في الشبكة مع الباحث </li>
                        <li>تأجير العقارات من السهل جدا مع عقاري !</li>
                        <li>بيع العقارات من السهل جدا مع عقاري !</li>
                    </ul>
                    <a href="{{route('register')}}" class="btn btn-lg btn-theme"> انضم إلينا الآن <i class="fa fa-refresh"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Container /- -->
    </div>
</section>


@endsection