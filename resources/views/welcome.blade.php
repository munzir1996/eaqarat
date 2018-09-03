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
                            <h1>تجد ما الذي تبحث عنه</h1>
                        </div>
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
                    <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu,
                        his dico ut debet consectetuer.</p>
                </div>
            </div>
            <!-- Middle Content Box -->
            <div class="col-xs-12 col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon"> <i class="flaticon-people"></i> </div>
                        <h4>أنشئ حسابك</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
                    </div>
                    <div class="how-it-work text-center ">
                        <div class="how-it-work-icon"> <i class="flaticon-people-2"></i> </div>
                        <h4>انشر عقارك مجانا</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
                    </div>
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon "> <i class="flaticon-heart-1"></i> </div>
                        <h4>الاتفاق تم</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
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
                    <h5>إعلانات مميزة</h5>
                    <h3>الحصول على مزيد من التعرض </h3>
                    <ul>
                        <li>العثور على السيارات المجاورة في الشبكة مع الباحث العلمي</li>
                        <li>تصفح المؤجرون الحقيقية مراجعات لمعرفة لماذا اختيار الباحث العلمي</li>
                        <li>تأجير السيارات من السهل جدا مع صنبور !</li>
                        <li>تأجير السيارات من السهل جدا مع صنبور !</li>
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