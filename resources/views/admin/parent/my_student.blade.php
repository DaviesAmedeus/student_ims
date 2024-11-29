<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent [{{ $parent->name }} {{ $parent->last_name }}] Student list</span> </h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add new Admin</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Form filter -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary">

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label value="">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Request::get('name') }}" placeholder="Search by name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label value="">Lat Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ Request::get('last_name') }}" placeholder="Search by last_name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label value="">Last name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ Request::get('last_name') }}"
                                                placeholder="Search by last name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label value="">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ Request::get('email') }}" placeholder="Search by email">
                                        </div>

                                        <div class="form-group col-md-3 pt-4">
                                            <button class="btn btn-primary btn-lg">Search</button>
                                            <a href="{{ url('admin/parent/my_student/'.$parent->id) }}"
                                                class="btn btn-success btn-lg">Reset</a>
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

        <!-- End Form filter -->
        <!-- Main content -->

        @if(!@empty($getSearchedStudents))
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile picture</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            <th>Parent Name</th>
                                            <th>Gender</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getSearchedStudents as $value)
                                            <tr>
                                                <td>
                                                    @if (!@empty($value->getProfilePicture()))
                                                        <img src="{{ $value->getProfilePicture() }}" alt=""
                                                            style="height: 60px; width:60px; border-radius:50%;"
                                                            class="img-thumbnail img-circle">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $value->name }}
                                                    @if ($value->middle_name)
                                                        {{ $value->middle_name }}
                                                    @endif
                                                    @if ($value->last_name)
                                                        {{ $value->last_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->parent_name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ $value->created_at }}</td>

                                                <td>
                                                    <a href="{{ url('admin/parent/assign_student_parent/' . $value->id.'/'.$parent->id) }}"
                                                        class="btn btn-primary">Add Student to Parent</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {{-- {!! $parents->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
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
        @endif

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
                                            <th>Profile picture</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            <th>Parent Name</th>
                                            <th>Gender</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getParentStudents as $value)
                                            <tr>
                                                <td>
                                                    @if (!@empty($value->getProfilePicture()))
                                                        <img src="{{ $value->getProfilePicture() }}" alt=""
                                                            style="height: 60px; width:60px; border-radius:50%;"
                                                            class="img-thumbnail img-circle">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $value->name }}
                                                    @if ($value->middle_name)
                                                        {{ $value->middle_name }}
                                                    @endif
                                                    @if ($value->last_name)
                                                        {{ $value->last_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->parent_name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ $value->created_at }}</td>

                                                <td>
                                                    <a href="{{ url('admin/parent/assign_student_parent_delete/' . $value->id) }}"
                                                        class="btn btn-danger">Deleye</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {{-- {!! $parents->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
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
