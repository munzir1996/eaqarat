<html lang="en" dir="rtl">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8">
    <title>AdminPanel | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author"> 
    @include('admin._includes._head')

</head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form action="{{ route('admin.login') }}" class="login-form" novalidate="novalidate" method="POST">
            @csrf
            <h3 class="form-title font-green">تسجيل دخول</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span>ادخل الأيميل و كلمة المرور. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">الأيميل</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="email" 
                 placeholder="الأيميل" name="email" id="email"> 
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور"
                    name="password" id="password"> 
            </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">تسجيل دخول</button>
            </div>

        </form>
        <!-- END LOGIN FORM -->
    </div>

    @include('admin._includes._javascript')

</body>

</html>