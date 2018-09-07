@extends('index')
@section('title', '  تعديل العقار')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" />
<style>
    .button{
        margin-top: 20px;
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
                    <h1>تعديل عقار </h1>
                </div>
            </div>
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
                                تعديل عقار
                            </h3>
                        </div>
                        <p class="lead">أنشر عقارك على
                            <a href="#">عقاري</a> بدون مقابل!:</p>
                        <div class="profile-section margin-bottom-20">
                            <div class="profile-tabs">
                                <ul class="nav nav-justified nav-tabs">
                                    <li class="active"><a href="#profile" data-toggle="tab">تعديل بيانات العقار</a></li>
                                    <li><a href="#password" data-toggle="tab">تغير حالة العقار</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="profile-edit tab-pane fade active in" id="profile">

                                        <div class="clearfix"></div>
                                        <form action="{{ route('eaqars.update', $estate->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf {{ method_field('PUT') }}
                                                <div class="row">
                                                    <!-- AREA  -->
                                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                                        <label class="control-label">المنطقه
                                                            <small>اختيار منطقة وجود العقار</small>
                                                        </label>
                                                        <select name="area_id" class="category form-control select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option label="Select Option"></option>
                                                            @foreach($areas as $area)
                                                            <option value="{{$area->id}}"
                                                                {{ $area->id == $estate->area_id ? 'selected' : '' }}>{{$area->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- Type  -->
                                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                                        <label class="control-label">النوع
                                                            <small>اختيار نوع العقار</small>
                                                        </label>
                                                        <select name="type_id" class="category form-control select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option label="Select Option"></option>
                                                            @foreach($types as $type)
                                                            <option value="{{$type->id}}"
                                                                {{ $type->id == $estate->type_id ? 'selected' : '' }}>{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- Price  -->
                                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                                        <label class="control-label">السعر
                                                            <small>جنية سوداني only</small>
                                                        </label>
                                                        <input name="price" class="form-control" type="text" value="{{$estate->price}}">
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
                                                                <input id="image" type="file" name="image">
                                                            </span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
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
                                                        <input name="description" class="form-control" type="text" value="{{$estate->description}}">
                                                    </div>
                                                    <button type="submit" class="button btn btn-theme pull-right">تعديل عقاري</button>
                                            
                                                </div>
                                                <!-- end row -->
                                            </form>
                                    </div>
                                    <div class="profile-edit tab-pane fade" id="password">
                                        <form action="{{ route('eaqars.update', $estate->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf {{ method_field('PUT') }}
                                            <!-- Ad Type  -->
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                    <label class="control-label">نوع العقار
                                                        <small> تريد بيع أو أيجار</small>
                                                    </label>
                                                    <div class="skin-minimal">
                                                        <ul class="list">
                                                            <li>
                                                                <input value="بيع" type="radio" id="type" name="type"
                                                                    {{ $estate->type == 'بيع' ? 'selected' : '' }}>
                                                                <label for="minimal-radio-1"> بيع </label>
                                                            </li>
                                                            <li>
                                                                <input value="أيجار" type="radio" id="type" name="type">
                                                                <label for="minimal-radio-2"
                                                                    {{ $estate->type == 'بيع' ? 'selected' : '' }}>
                                                                    أيجار</label>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                    <label class="control-label">الحالة
                                                        <small> هل متوفر أو غير متوفر</small>
                                                    </label>
                                                    <div class="skin-minimal">
                                                        <ul class="list">
                                                            <li>
                                                                <input value="1" type="radio" id="status" name="status">
                                                                <label for="minimal-radio-1"> متوفر </label>
                                                            </li>
                                                            <li>
                                                                <input value="0" type="radio" id="status" name="status">
                                                                <label for="minimal-radio-2"> غير متوفر</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <button type="submit" class="button btn btn-theme pull-right">تعديل الحالة</button>
                                        
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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