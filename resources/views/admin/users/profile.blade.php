@extends('metronic')
@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('users.index')}}">المستخدمين</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<div class="profile-content">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET -->
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">حسابك</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab" aria-expanded="true">بياناتك الشخصية</a>
                        </li>
                        <li class="">
                            <a href="#tab_1_2" data-toggle="tab" aria-expanded="false">تغيير كلمة المرور</a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <!--BEGIN TABS-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                                @csrf {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>الأسم</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"> </div>

                                    <label>البريد الألكتروني</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                                    </div>

                                    <label>العنوان</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </span>
                                        <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                                    </div>

                                    <label>رقم الهاتف</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input class="form-control" name="phone" value="{{Auth::user()->phone}}" number>
                                    </div>
                                </div>
                                <div class="margin-top-10">
                                    <button type="submit" class="btn green"> حفظ التعديلات </button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="tab_1_2">

                            <div class="form-group">
                                <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                                    @csrf {{ method_field('PUT') }}
                                    <label>كلمة المرور الجديدة</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control" placeholder="كلمة المرور الجديدة">
                                    </div>
                                    <div class="margin-top-10">
                                        <button type="submit" class="btn green"> حفظ التعديلات </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PORTLET -->
        </div>
    </div>
</div>

@endsection