<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assigned Subjects <span class="badge badge-secondary"> Total: </span> </h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">Assign Subject to a
                            Class</a>
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
                                            <input type="text" name="class_name" class="form-control"
                                                value="{{ Request::get('class_name') }}" placeholder="Search by class_name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <input type="text" name="subject_name" class="form-control"
                                                value="{{ Request::get('subject_name') }}" placeholder="Search by subject_name">
                                        </div>


                                        <div class="form-group col-md-3">
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Request::get('date') }}" placeholder="Search by date">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success">Reset</a>
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
                                            <th>Class Name </th>
                                            <th>Subject Name </th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->subject_name }}</td>
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
                                                <a href="{{ url('admin/assign_subject/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/assign_subject/delete/' . $value->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
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
