@extends('includes.admin.master_admin')
@section('title')
   Edit
@endsection
@section('head_style')
    @include('includes.admin.dataTables.head_DataTables')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
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
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                Create
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('errors.error')
                            <form action="{{route('user.update',$data->id)}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" name="name"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               value="{{ $data->name }}" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email</label>
                                        <input type="email" name="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               value="{{ $data->email }}" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">website</label>
                                        <input type="text" name="website"
                                               class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                               value="{{ $data->website }}" placeholder="Enter website">
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : "" }}">
                                            <label>Permission</label>
                                            <select class="duallistbox" multiple="multiple" name="role[]">
                                                @foreach($role as $ro)
                                                    <option @foreach($user_role as $userrole)
                                                            @if($userrole->role_id == $ro->id)  selected  @endif  @endforeach
                                                            value="{{$ro->id}}" >{{$ro->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script_style')
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('public/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <script>
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    </script>
@endsection
