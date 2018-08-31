@extends('index')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
<style>
    .top-space {
        margin-top: 50px;
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
                    <h1>البورصة</h1>
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
                    <a class="active" href="{{route('stock')}}">البورصة</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <div class="container">

        <div class="top-space"></div>
        <!-- BEGIN DATATABLE -->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <!-- BEGIN TABLE -->
                <div class="">
                    <table id="markets-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>أسم المنطقه</th>
                                <th>السعر الأبتدائي</th>
                                <th>السعر النهائي</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($markets as $market)
                            <tr>
                                <td>{{$market->id}}</td>
                                <td>{{$market->area->name}}</td>
                                <td>{{$market->start_price}}</td>
                                <td>{{$market->end_price}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END TABLE -->
            </div>
        </div>
        <!-- END DATATABLE -->

    </div>
</div>

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#markets-table').DataTable();
    });
</script>
@endsection
<!-- END SCRIPTS -->