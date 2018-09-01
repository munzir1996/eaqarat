<div class="colored-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">

                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right flip">
                        @guest
                        <ul class="listnone">
                            <li>
                                <a href="{{route('login')}}">
                                    <i class="fa fa-sign-in"></i> تسجيل الدخول</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}">
                                    <i class="fa fa-unlock" aria-hidden="true"></i> تسجيل</a>
                            </li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-profile-male" aria-hidden="true"></i>{{Auth::user()->name}}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('user.profile', Auth::user()->id) }}">ملف تعريفي للمستخدم</a>
                                    </li>
                                    <li>
                                        <a href="{{route('eaqars.show', Auth::user()->id)}}">عقارات</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i>تسجيل خروج</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Navigation Menu -->
    <nav id="menu-1" class="mega-menu" style="">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <!-- menu links -->
                        <ul class="menu-links menu-links-align-right" style="display: none; max-height: 400px; overflow: auto;">
                            <!-- active class -->


                            <li>
                                <a href="{{route('home')}}">الصفحة الرئيسية </a>
                            </li>
                            <li class="hoverTrigger">
                                <a href="#">العقارات
                                    <i class="fa fa-angle-down fa-indicator"></i>
                                    <div class="mobileTriggerButton"></div>
                                </a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel effect-expand-top" style="transition: all 400ms ease 0s;">

                                    <li>
                                        <a href="{{route('sale')}}"> بيع</a>
                                    </li>
                                    <li>
                                        <a href="{{route('rent')}}"> أيجار </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('stock')}}">البورصة</a>
                            </li>
                            <li>
                                <a href="{{route('block')}}">تمليك</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">معلومات عننا </a>
                            </li>
                        </ul>
                        @auth
                        <ul class="menu-search-bar active">
                            <li>
                                <a href="{{route('eaqars.create')}}" class="btn btn-light">
                                    <i class="fa fa-plus" aria-hidden="true"></i>عرض عقار</a>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    </nav>
</div>