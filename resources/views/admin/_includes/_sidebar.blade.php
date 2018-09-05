<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="heading">
                <h3 class="uppercase">لوحة التحكم</h3>
            </li>
            <li class="nav-item  ">
                <a href="{{route('admin')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الصفحة الرئيسية</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">المستخدمين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li class="nav-item start ">
                        <a href="{{route('users.index')}}" class="nav-link ">
                            <i class=" icon-user"></i>
                            <span class="title">العملاء</span>
                        </a>
                    </li>
                    <li class="nav-item start">
                        <a href="{{route('admins.index')}}" class="nav-link ">
                            <i class="icon-user-follow"></i>
                            <span class="title">الأدمن</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{route('types.index')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">الأنواع</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('areas.index')}}" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">المناطق</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('rates.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">التقييم</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('estates.index')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">العقارات</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('markets.index')}}" class="nav-link nav-toggle">
                    <i class="icon-graph"></i>
                    <span class="title">البورصة</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('properties.index')}}" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">التمليك</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('complains.index')}}" class="nav-link nav-toggle">
                    <i class="icon-paper-plane"></i>
                    <span class="title">الشكاوي</span>
                </a>
            </li>

        </ul>
        </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>