@extends('index') 
@section('title', ' عرض عقار')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" /> 
@endsection
<!-- END CSS -->

@section('content')

<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>عرض عقار </h1>
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
                    <a class="active" href="{{route('eaqars.create')}}">عرض عقار</a>
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
                                أضف عقارك
                            </h3>
                        </div>
                        <p class="lead">أنشر عقارك على
                            <a href="#">عقاري</a> بدون مقابل! ومع ذلك، يجب على جميع العقارات اتباع قواعد لدينا:</p>
                        <form action="{{ route('eaqars.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- AREA  -->
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">المنطقه
                                        <small>اختيار منطقة وجود العقار</small>
                                    </label>
                                    <select name="area_id" class="category form-control select2-hidden-accessible" 
                                    tabindex="-1" aria-hidden="true" required>
                                        <option label="Select Option"></option>
                                        @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Type  -->
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">النوع
                                        <small>اختيار نوع العقار</small>
                                    </label>
                                    <select name="type_id" class="category form-control select2-hidden-accessible" 
                                    tabindex="-1" aria-hidden="true" required>
                                        <option label="Select Option"></option>
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Price  -->
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">السعر
                                        <small>جنية سوداني only</small>
                                    </label>
                                    <input name="price" class="form-control" type="text" required>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- Image Upload  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">صورة للعقار
                                        <small>الرجاء إضافة صورة للعقار. (350x450)</small>
                                    </label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="image" type="file" name="image" required>
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- Ad Description  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">وصف العقار
                                        <small>أدخل وصف للعقار الخاص بك</small>
                                    </label>
                                    <input name="description" class="form-control" type="text" required>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- Ad Type  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">نوع العقار
                                        <small> تريد بيع أو أيجار</small>
                                    </label>
                                    <div class="skin-minimal">
                                        <ul class="list" >
                                            <li>
                                                <input value="بيع" type="radio" id="type" 
                                                name="type">
                                                <label for="minimal-radio-1"> بيع </label>
                                            </li>
                                            <li>
                                                <input value="أيجار" type="radio" id="type" name="type">
                                                <label for="minimal-radio-2"> أيجار</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-theme pull-right">أنشر عقاري</button>
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