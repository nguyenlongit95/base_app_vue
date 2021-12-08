@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Widget</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <!-- Begin card -->
            <div class="card">
                <div class="card-header">
                    <h3>Create new Widget</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>Key</td>
                            <td>Value</td>
                            <td class="text-right">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                            <form action="{{ url('/admin/widgets/create') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="key" placeholder="Key"></td>
                                    <td><input type="text" class="form-control" id="exampleInputEmail1" name="value" placeholder="Value"></td>
                                    <td><input type="submit" value="Create" class="float-right btn btn-danger margin-right-5"></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End card -->

            <!-- Begin card -->
            <div class="card">
                <div class="card-header">
                    <h3>List all widget</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Key</td>
                            <td>Value</td>
                            <td class="text-right">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($widgets))
                            @foreach($widgets as $widget)
                                <form action="{{ url('/admin/widgets/'.$widget->id.'/update') }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <tr>
                                        <td>{{ $widget->id }}</td>
                                        <td><input type="text" class="form-control" id="exampleInputEmail1" name="key" value="{{ $widget->key }}"></td>
                                        <td><input type="text" class="form-control" id="exampleInputEmail1" name="value" value="{{ $widget->value }}"></td>
                                        <td class="text-center">
                                            <a class="float-right btn btn-danger" href="{{ url('/admin/widgets/'.$widget->id.'/delete') }}">Delete </a>
                                            <input type="submit" value="Update" class="float-right btn btn-warning margin-right-5">
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
@endsection
