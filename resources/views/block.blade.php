@extends('index')

<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" />
<style>
    .title {
        margin-top: 20px;
        margin-bottom: 20px;
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
                    <h1>الأستمارة </h1>
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
                    <a class="active" href="{{route('block')}}">الأستمارة</a>
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
                                الأستمارة
                            </h3>
                        </div>
                        <h2 class="title">{{$title->name}}</h2>
                        <form action="{{ route('block.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- name  -->
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">الأسم
                                    </label>
                                    <input name="name" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Hire  -->
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">تاريخ التعين
                                    </label>
                                    <input name="hire_date" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Age  -->
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">العمر
                                    </label>
                                    <input name="age" class="form-control" type="text" required>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- Salary Upload  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">شهادة مرتب
                                    </label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="salary_pdf" type="file" name="salary_pdf">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                            data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- offical Upload  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">أقرار شرعي
                                    </label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="offical_pdf" type="file" name="offical_pdf">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                            data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-theme pull-right">أضافة</button>
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

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{asset('vendor/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    $('.fileinput').fileinput()
</script>
@endsection
<!-- END SCRIPTS -->