@extends('metronic')
@section('title', ' جدول الشكاوي')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
@endsection
<!-- END CSS -->
@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('complains.index')}}">الشكاوي</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> الشكاوي </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول الشكاوي</span>
        </div>
    </div>
    <div class="portlet-body">
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="complains-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>الأسم</th>
                        <th>البريد الألكتروني</th>
                        <th>العنوان</th>
                        <th>رقم الهاتف</th>
                        <th>العمليات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($complains as $complain)
                    <tr>
                        <td>{{$complain->id}}</td>
                        <td>{{$complain->name}}</td>
                        <td>{{$complain->email}}</td>
                        <td>{{$complain->address}}</td>
                        <td>{{$complain->phone}}</td>
                        <td>
                            <form action="{{route('complains.destroy', $complain->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('complains.show', $complain->id)}}" class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-share"> عرض </i>
                                </a>
                                <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit">حذف</i>
                                </button>
                            </form>
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

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#complains-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    messageTop: 'This print was produced using the Print button for DataTables',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });
    });
</script>
@endsection
<!-- END SCRIPTS -->