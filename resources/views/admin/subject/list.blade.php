<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject List <span class="badge badge-secondary"> Total: </span> </h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Add new Subject</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary">

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Request::get('name') }}" placeholder="Search by name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            {{-- <label>Subject Type</label> --}}
                                            <select class="form-control" name="type" >
                                                <option value="">Select type</option>
                                                <option {{ (Request::get('type')==0) ? 'selected' : '' }} value="0">Theory</option>
                                                <option {{ (Request::get('type')==1) ? 'selected' : ''}} value="1">Practical</option>

                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Request::get('date') }}" placeholder="Search by date">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{ url('admin/subject/list') }}" class="btn btn-success">Reset</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>




                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('_message')
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name </th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    @php $num =1; @endphp
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $num }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @if ($value->type == 0)
                                                        Theory
                                                    @else
                                                        Practical
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->status == 1)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subject/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/subject/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                            @php $num++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.col -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-layout>
