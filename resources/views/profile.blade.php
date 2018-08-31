@extends('index')

@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>ملف تعريفي للمستخدم</h1>
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
                    <a class="active" href="{{route('user.profile', Auth::user()->id)}}">ملف تعريفي للمستخدم</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->

<div class="main-content-area clearfix" style="transform: none;">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray" style="transform: none;">
        <!-- Main Container -->
        <div class="container" style="transform: none;">
            <!-- Row -->
            <div class="row" style="transform: none;">
                <!-- Middle Content Area -->
                <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!-- Sidebar Widgets -->

                    <!-- الفئات -->

                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                        <div class="user-profile">
                            <div class="profile-detail">
                                <h6>{{Auth::user()->name}}</h6>
                                <ul class="contact-details">
                                    <li>
                                        <i class="fa fa-map-marker"></i>{{Auth::user()->address}}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>{{Auth::user()->email}}
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>{{Auth::user()->phone}}
                                    </li>
                                </ul>
                            </div>
                            <ul>
                                <li class="active"><a href="{{ route('user.profile', Auth::user()->id) }}">الملف الشخصي</a></li>
                            <li><a href="{{route('eaqars.show', Auth::user()->id)}}">عقارات <span class="badge">{{$user->estates->count()}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">تعديل الملف الشخصي</a></li>
                                <li><a href="#password" data-toggle="tab">تغير كلمة المرور</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="profile-edit tab-pane fade active in" id="profile">

                                    <div class="clearfix"></div>
                                    <form action="{{ route('updateuser.profile', Auth::user()->id) }}" method="POST">
                                        @csrf 
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>اسمك </label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" 
                                                class="form-control margin-bottom-20">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>عنوان البريد الإلكتروني <span class="color-red">*</span></label>
                                                <input type="email" name="email" value="{{Auth::user()->email}}" 
                                                class="form-control margin-bottom-20">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>رقم الهاتف<span class="color-red">*</span></label>
                                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control margin-bottom-20">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>العنوان<span class="color-red">*</span></label>
                                                <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control margin-bottom-20">
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <div class="row">

                                            <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                                <button type="submit" class="btn btn-theme btn-sm">تعديل البيانات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="profile-edit tab-pane fade" id="password">
                                    <form action="#" id="sky-form" class="sky-form" novalidate="">
                                        <!--Checkout-Form-->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>كلمت المرور<span class="color-red">*</span></label>
                                            <input type="password" class="form-control margin-bottom-20">
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-theme">تغير كلمة المرور</button>
                                        <!--End Checkout-Form-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
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