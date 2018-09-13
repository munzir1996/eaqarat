@extends('index')
@section('title', '  جدول النتيجة')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
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
                    <h1>النتيجة</h1>
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
                    <a class="active" href="{{route('result')}}">النتيجه</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <div class="container">

        <h2 class="title"></h2>
        <div class="top-space"></div>
        <!-- BEGIN DATATABLE -->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <!-- BEGIN TABLE -->
                <div class="">
                    <table id="results-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>الأسم</th>
                                <th>نوع التمليك</th>
                                <th>النتيجة</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($properties as $propert)
                            <tr>
                                <td>{{$propert->id}}</td>
                                <td>{{$propert->name}}</td>
                                <td>{{$propert->property_type}}</td>
                                <td>
                                    @if($propert->type == 1)
                                    <span class="label label-sm label-success">قبول</span>
                                    @endif
                                </td>
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
        $('#results-table').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'print'
        ]
        });
    });
</script>
@endsection
<!-- END SCRIPTS -->