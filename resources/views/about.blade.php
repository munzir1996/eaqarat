@extends('index')
@section('title', ' معلومات عننا ')
@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>معلومات عنا</h1>
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
                    <a class="active" href="{{route('about')}}">معلومات عنا</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding pattern_dots">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                    <div class="about-us-content">
                        <div class="heading-panel">
                            <h3 class="main-title text-left">
                                حول AdForest
                            </h3>
                        </div>
                        <h2></h2>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambledit to make a type specimen book. It has survived not only
                            five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged.It has survived not only five centuries, but also the leap into publishing
                            software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Hmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledit
                            to make a type specimen It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged.</p>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    <section class="about-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>لماذا أخترتنا</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus.
                                Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                    </div>
                    <!-- service box end -->
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>مهمتنا</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus.
                                Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                    </div>
                    <!-- service box end -->
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>حلول خلاقة فقط</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus.
                                Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                    </div>
                    <!-- service box end -->
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <div class="clearfix"></div>
    <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
    <div class="funfacts custom-padding parallex">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="{{$estates->count()}}" data-speed="1500" 
                        data-refresh-interval="5">0</span>+</div>
                    <h4>
                        <span>عقارات</span>
                    </h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="{{$users->count()}}" data-speed="1500" 
                        data-refresh-interval="5">0</span>+</div>
                    <h4>
                        <span>عملاء</span>
                    </h4>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.funfacts -->
    <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
    
</div>

@endsection