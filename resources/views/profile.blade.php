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
                        <a class="active" href="{{route('about')}}">ملف تعريفي للمستخدم</a>
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
                    
                 <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;"><div class="user-profile">
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
                          <li class="active"><a href="profile.html">الملف الشخصي</a></li>
                          <li><a href="active-ads.html">الإعلانات <span class="badge">45</span></a></li>
                          <li><a href="favourite.html">إعلانات مفضلة <span class="badge">15</span></a></li>
                          <li><a href="archives.html">أرشيف</a></li>
                          <li><a href="messages.html">رسائل</a></li>
                          <li><a href="#">خروج</a></li>
                       </ul>
                    </div><div class="widget">
                       <div class="widget-heading">
                          <h4 class="panel-title"><a>تغيير خطتك</a></h4>
                       </div>
                       <div class="widget-content">
                          <select class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                             <option label="Select Option"></option>
                             <option value="0">Free</option>
                             <option value="1">Premium</option>
                             <option value="2">Featured</option>
                          </select><span class="select2 select2-container select2-container--default select2-container--below" dir="rtl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-l8sf-container"><span class="select2-selection__rendered" id="select2-l8sf-container"><span class="select2-selection__placeholder">Select an option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                       </div>
                    </div></div></div>
                 <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="profile-section margin-bottom-20">
                       <div class="profile-tabs">
                          <ul class="nav nav-justified nav-tabs">
                             <li class="active"><a href="#profile" data-toggle="tab" >الملف الشخصي</a></li>
                             <li class="active"><a href="#edit" data-toggle="tab" aria-expanded="true">تعديل الملف الشخصي</a></li>
                             <li><a href="#payment" data-toggle="tab">إعداد خطة</a></li>
                          </ul>
                          <div class="tab-content">
                             <div class="profile-edit tab-pane fade active in" id="profile">
                                <h2 class="heading-md">Manage your Name, ID and عنوان البريد الإلكترونيes.</h2>
                                <p>Below are the name and email addresses on file for your account.</p>
                                <dl class="dl-horizontal">
                                   <dt><strong>Your name </strong></dt>
                                   <dd>
                                      John Doe
                                   </dd>
                                   <dt><strong>عنوان البريد الإلكتروني </strong></dt>
                                   <dd>
                                      contact@scriptsbundle.com
                                   </dd>
                                   <dt><strong>Phone Number </strong></dt>
                                   <dd>
                                      (0423) 12-2345-789
                                   </dd>
                                   <dt><strong>Country </strong></dt>
                                   <dd>
                                      إنكلترا
                                   </dd>
                                   <dt><strong>City </strong></dt>
                                   <dd>
                                      London
                                   </dd>
                                   <dt><strong>You are a </strong></dt>
                                   <dd>
                                      تاجر
                                   </dd>
                                   <dt><strong>Address </strong></dt>
                                   <dd>
                                      Lahore, PK
                                   </dd>
                                </dl>
                             </div>
                             <div class="profile-edit tab-pane fade" id="edit">
                                <h2 class="heading-md">Manage your Security Settings</h2>
                                <p>Manage Your Account</p>
                                <div class="clearfix"></div>
                                <form>
                                   <div class="row">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                         <label>اسمك </label>
                                         <input type="text" class="form-control margin-bottom-20">
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                         <label>عنوان البريد الإلكتروني <span class="color-red">*</span></label>
                                         <input type="text" class="form-control margin-bottom-20">
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">  
                                         <label>Contact Number <span class="color-red">*</span></label>
                                         <input type="text" class="form-control margin-bottom-20">
                                      </div>
                                      <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                         <label>Country <span class="color-red">*</span></label>
                                         <select class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option value="0">SriLanka</option>
                                            <option value="1">أستراليا</option>
                                            <option value="2">Bahrain</option>
                                            <option value="3">Canada</option>
                                            <option value="4">Denmark</option>
                                            <option value="5">Germany</option>
                                         </select><span class="select2 select2-container select2-container--default" dir="rtl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-x73i-container"><span class="select2-selection__rendered" id="select2-x73i-container" title="SriLanka"><span class="select2-selection__clear">×</span>SriLanka</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                      </div>
                                      <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                         <label>City <span class="color-red">*</span></label>
                                         <select class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option value="0">London</option>
                                            <option value="1">Edinburgh</option>
                                            <option value="2">Wales</option>
                                            <option value="3">Cardiff</option>
                                            <option value="4">Bradford</option>
                                            <option value="5">Cambridge</option>
                                         </select><span class="select2 select2-container select2-container--default" dir="rtl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-vz35-container"><span class="select2-selection__rendered" id="select2-vz35-container" title="London"><span class="select2-selection__clear">×</span>London</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                         <label>Address <span class="color-red">*</span></label>
                                         <textarea class="form-control margin-bottom-20" rows="3"></textarea>
                                      </div>
                                   </div>
                                   <div class="row margin-bottom-20">
                                      <div class="form-group">
                                         <div class="col-md-9">
                                            <div class="input-group">
                                               <span class="input-group-btn">
                                               <span class="btn btn-default btn-file">
                                               Browse… <input type="file" id="imgInp">
                                               </span>
                                               </span>
                                               <input type="text" class="form-control" readonly="">
                                            </div>
                                         </div>
                                         <div class="col-md-3">
                                            <img id="img-upload" class="img-responsive" src="images/users/2.jpg" alt="">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="clearfix"></div>
                                   <div class="row">
                                      <div class="col-md-8 col-sm-8 col-xs-12">
                                         <div class="form-group">
                                            <div class="skin-minimal">
                                               <ul class="list">
                                                  <li>
                                                     <div class="icheckbox_minimal" style="position: relative;"><input type="checkbox" id="minimal-checkbox-7" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                                     <label for="minimal-checkbox-7">i agree <a href="#">Terms of Services</a></label>
                                                  </li>
                                               </ul>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                         <button type="submit" class="btn btn-theme btn-sm">Update My Info</button>
                                      </div>
                                   </div>
                                </form>
                             </div>
                             <div class="profile-edit tab-pane fade" id="payment">
                                <h2 class="heading-md">Manage your Package Settings</h2>
                                <p>Below are the payment options for your account.</p>
                                <br>
                                <form action="#" id="sky-form" class="sky-form" novalidate="">
                                   <!--Checkout-Form-->
                                   <dl class="dl-horizontal">
                                      <dt><strong>Current Plan</strong></dt>
                                      <dd>
                                         Premium
                                      </dd>
                                      <dt><strong>Expiration Date </strong></dt>
                                      <dd>
                                         2nd January 2017
                                      </dd>
                                   </dl>
                                   <div class="row">
                                      <div class="col-sm-12 col-md-12 margin-bottom-20">
                                         <label>حدد خطة You Want To Change<span class="color-red">*</span></label>
                                         <select class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                            <option value="0">Free</option>
                                            <option value="1">Premium</option>
                                            <option value="2">Advanced</option>
                                         </select><span class="select2 select2-container select2-container--default" dir="rtl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-u464-container"><span class="select2-selection__rendered" id="select2-u464-container" title="Free"><span class="select2-selection__clear">×</span>Free</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                      </div>
                                   </div>
                                   <button class="btn btn-sm btn-default" type="button">Cancel</button>
                                   <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
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