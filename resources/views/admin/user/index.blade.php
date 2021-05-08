@extends('includes.admin.master_admin')
@section('title')
   Index
@endsection
@section('head_style')
    @include('includes.admin.dataTables.head_DataTables')
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="get" action="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @if(permissionShow('user-create'))
                                        <a href="{{  route('user.create') }}"
                                           class="btn btn-primary">Create</a>
                                            @endif
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                             <th>name</th>
                                             <th>email</th>
                                             <th>website</th>
                                             <th>user create</th>
                                             <th>verification</th>
                                            @if(permissionShow('user-edit'))
                                            <th>controller</th>
                                                @endif
                                        </tr>
                                        </thead>
                                        <tbody id="body">
                                        @forelse($datas as $data)
                                            <tr id="data-{{$data->id}}">
                                                <td id="name-{{$data->id}}">{{$data->name}}</td>
                                                <td id="email-{{$data->id}}">{{$data->email}}</td>
                                                <td id="website-{{$data->id}}">{{$data->website}}</td>
                                                <td id="user-{{$data->id}}">{{$data->user->name}}</td>
                                                <td id="verification-{{$data->id}}">{{$data->email_verified_at ? 'done' : "not yet"}}</td>
                                                @if(permissionShow('user-edit'))
                                                <td>
                                                   <a href="{{  route('user.edit',$data->id) }}"
                                                      class="btn btn-primary">Edit</a>
                                                </td>
                                                    @endif
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>website</th>
                                            <th>user create</th>
                                            <th>verification</th>
                                            @if(permissionShow('user-edit'))
                                            <th>controller</th>
                                                @endif
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script_style')
    @include('includes.admin.dataTables.script_DataTables')
@endsection
