@extends('index')

@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>التفاصيل</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding error-page pattern-bgs gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- إعلان واحد -->
                    <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                            <h1>{{$estate->user->name}}</h1>
                            <div class="short-history">
                                <ul>
                                    <li>منشور على: <b>{{ date('M j, Y ',strtotime($estate->created_at)) }}</b></li>
                                    <li>فئة: <b><a href="#">{{$type[0]}}</a></b></li>
                                    <li>موقع: <b>{{$estate->area->name}}</b></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider  -->
                        <div class="flexslider single-page-slider">
                            <div class="flex-viewport">

                            </div>
                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides slide-main" style="width: 1200%; transition-duration: 0s; transform: translate3d(-3750px, 0px, 0px);">
                                    <li class="" style="width: 750px; float: left; display: block;">
                                        <img alt="" src="{{asset('image/'.$estate->image)}}" title="" draggable="false">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- حصة الإعلان  -->
                        <div class="clearfix"></div>
                        <!-- Short Description  -->
                        <div class="ad-box">

                            <!-- Ad Specifications -->
                            <div class="specification">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        مواصفات
                                    </h3>
                                </div>
                                <p>
                                    {{$estate->description}}
                                </p>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- إعلان واحد End -->
                    <!-- Price Alert -->
                    <div class="alert-box-container  margin-top-30">
                        <div class="blog-section">
                            <div class="blog-heading">
                                <h2>تعليقات ({{$estate->comments->count()}})</h2>
                                <hr>
                            </div>
                            <ol class="comment-list">
                                <!-- comment-list    -->
                                @foreach($comments as $comment)
                                <li class="comment">
                                    <div class="comment-info">
                                        <div class="author-desc">
                                            <div class="author-title">
                                                <strong>{{$comment->user->name}}</strong>
                                                <ul class="list-inline pull-right flip">
                                                    <li><a href="#">{{ date('M j, Y ',strtotime($comment->created_at))
                                                            }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-reply"></i>التقيم:
                                                            {{$comment->rate->rate}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        </div>

                        <div class="clearfix"></div>
                        <div class="blog-section">
                            <div class="blog-heading">
                                <h2>أترك تعليق </h2>
                                <hr>
                            </div>
                            @auth
                            <div class="commentform">
                                <form action="{{ route('detail.comment') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                                <label>التقيم <span class="required">*</span>
                                                </label>
                                                <select class="category form-control select2-hidden-accessible" name="rate_id"
                                                     aria-hidden="true" required>
                                                    <option label="Select Option"></option>
                                                    @foreach($rates as $rate)
                                                    <option value="{{$rate->id}}">{{$rate->rate}}</option>
                                                    @endforeach
                                                </select>
                                           
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>التعليق <span class="required">*</span>
                                                </label>
                                                <textarea name="comment" id="comment" class="form-control" placeholder="" 
                                                rows="8" cols="6" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 margin-top-20 clearfix">
                                            <button type="submit" class="btn btn-theme">أضف تعليقك</button>
                                        </div>
                                        <input type="hidden" name="estate_id" value="{{$estate->id}}">
                                    </div>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                    <!-- Price Alert End -->

                </div>
                <!-- Right Sidebar -->
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                            <!-- Email Button trigger modal -->
                            <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote">تواصل
                                مع البائع</button>
                            <!-- Email Modal -->
                            <button class="btn-block btn-contact contactPhone number">{{$estate->user->phone}}</button>
                        </div>
                        <!-- Price info block -->
                        <div class="ad-listing-price">
                            <p> {{$estate->price}} جنية</p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                            <div class="ad-listing-meta">
                                <ul>
                                    <li>رقم العقار: <span class="color">{{$estate->id}}</span></li>
                                    <li>الفئات: <span class="color">{{$type[0]}}</span></li>
                                    <li>موقع: <span class="color">{{$estate->area->name}}</span></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->

</div>

@endsection