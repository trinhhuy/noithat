@extends('layouts.app')

@section('content')
<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Danh mục</a>
        </li>
        <li class="active">Danh sách</li>
    </ul><!-- /.breadcrumb -->
    <!-- /section:basics/content.searchbox -->
</div>
<!-- /section:basics/content.breadcrumbs -->

<div class="page-content">
    <div class="page-header">
        <h1>
            Danh mục tiêu biểu
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Danh sách
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <form role="form" method="POST" action="">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}

                    @foreach($categories as $category)
                        <div class="col-xs-6">
                            <label class="inline">
                                <small class="muted smaller-90">{{ $category->name }}</small>
                                <input id="id-button-borders" checked="checked" type="checkbox" class="ace ace-switch ace-switch-5">
                                <span class="lbl middle"></span>
                            </label>
                        </div>
                    @endforeach


                <div class="clearfix">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-success">
                            <i class="ace-icon fa fa-save bigger-110"></i>Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.page-content -->
@endsection
@section('scripts')
    <script src="/vendor/ace/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="/vendor/ace/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
@endsection

@section('inline_scripts')
    <script>
        $(function () {
            var datatable = $("#dataTables-categories").DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 100,
                ajax: {
                    url: '{!! route('categories.datatables') !!}',
                    data: function (d) {
                        //
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
//                    {data: 'parent_id', name: 'parent_id'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
