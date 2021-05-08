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
                        <h1>permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">permission</li>
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
                                        @if(permissionShow('permission-create'))
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-create">
                                           Create
                                        </button>
                                            @endif
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                             <th>name</th>
                                            <th>show name</th>
                                            <th>description</th>
                                            @if(permissionShow('permission-edit'))
                                            <th>controller</th>
                                                @endif
                                        </tr>
                                        </thead>
                                        <tbody id="body">
                                        @forelse($datas as $data)
                                            <tr id="data-{{$data->id}}">
                                                <td id="name-{{$data->id}}">{{$data->name}}</td>
                                                <td id="show_name-{{$data->id}}">{{$data->show_name}}</td>
                                                <td id="description-{{$data->id}}">{{$data->description}}</td>
                                                @if(permissionShow('permission-edit'))
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-outline-primary btn-block btn-sm"
                                                            onclick="showItem({{$data->id}})">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button id="openModael{{$data->id}}" type="button" class="d-none"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit">
                                                    </button>
                                                </td>
                                                    @endif
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>name</th>
                                            <th>show name</th>
                                            <th>description</th>
                                            @if(permissionShow('permission-edit'))
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
    @if(permissionShow('permission-create'))
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Create</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="create" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('name') ? ' is-invalid' : "" }}">
                            <label for="sales_target">name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   value="{{Request::old('name')}}" placeholder="Enter name">
                        </div>
                        <!-- /.card-body -->
                        <div class="form-group{{ $errors->has('show_name') ? ' is-invalid' : "" }}">
                            <label for="sales_target">show name</label>
                            <input type="text" name="show_name" class="form-control" id="show_name"
                                   value="{{Request::old('show_name')}}" placeholder="Enter show name">
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : "" }}">
                            <label for="sales_target">description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                   value="{{Request::old('description')}}" placeholder="Enter description">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Create</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif
    @if(permissionShow('permission-edit'))
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit" action="" method="post" name="edit" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('name') ? ' is-invalid' : "" }}">
                                <label for="sales_target">name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       value="" placeholder="Enter name">
                            </div>
                            <!-- /.card-body -->
                            <div class="form-group{{ $errors->has('show_name') ? ' is-invalid' : "" }}">
                                <label for="sales_target">show name</label>
                                <input type="text" name="show_name" class="form-control" id="show_name"
                                       value="" placeholder="Enter show name">
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' is-invalid' : "" }}">
                                <label for="sales_target">description</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       value="" placeholder="Enter description">
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif
@endsection
@section('script_style')
    @include('includes.admin.dataTables.script_DataTables')
    @if(permissionShow('permission-edit'))
    <script>
        //show item
        function showData(res) {
            $("#edit #name").val(res.name);
            $('#edit #show_name').val(res.show_name);
            $('#edit #description').val(res.description);
        }
        //edit data
        function updateItem(res) {
            document.getElementById('name-' + res.id).innerHTML = res.name;
            document.getElementById('show_name-' + res.id).innerHTML = res.show_name;
            document.getElementById('description-' + res.id).innerHTML = res.description;
        }
        </script>
    @endif
@endsection
