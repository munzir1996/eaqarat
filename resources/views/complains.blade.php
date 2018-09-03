@extends('index')

@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>الشكاوي</h1>
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
                    <a class="active" href="#">الشكاوي</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding  gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="#">
                    <!-- end post-padding -->
                    <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                            <h3 class="main-title text-left">
                                الشكاوي
                            </h3>
                        </div>
                        <form action="{{ route('complain.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- name  -->
                                <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                    <label class="control-label">الأسم
                                    </label>
                                    <input name="name" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- email  -->
                                <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                    <label class="control-label">البريد الألكتروني
                                    </label>
                                    <input name="email" class="form-control" type="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- address  -->
                                <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                    <label class="control-label">العنوان
                                    </label>
                                    <input name="address" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- phone  -->
                                <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                    <label class="control-label">رقم الهاتف
                                    </label>
                                    <input name="phone" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- complain  -->
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">الشكوة
                                    </label>
                                    <textarea name="complain" class="form-control" type="text" required></textarea>
                                </div>
                            </div>
                            <br>
                            <!-- end row -->
                            <button type="submit" class="btn btn-theme pull-right">تقديم الشكوة</button>
                        </form>
                    </div>
                    <!-- end post-ad-form-->
                </div>
                <!-- end col -->
                <!-- Right Sidebar -->

                <!-- Middle Content Area  End -->
                <!-- end col -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
</div>

@endsection