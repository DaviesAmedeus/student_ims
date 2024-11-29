<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List <span class="badge badge-secondary"> Total: {{ $students->total() }}</span>
                        </h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add new Student</a>
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

                                        <div class="form-group col-md-3">
                                            <label value="">Admission number</label>
                                            <input type="text" name="adminssion_number" class="form-control"
                                                value="{{ Request::get('adminssion_number') }}"
                                                placeholder="Search by adminssion_number">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Roll number</label>
                                            <input type="text" name="roll_number" class="form-control"
                                                value="{{ Request::get('roll_number') }}"
                                                placeholder="Search by roll_number">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Class name</label>
                                            <input type="text" name="class_name" class="form-control"
                                                value="{{ Request::get('class_name') }}"
                                                placeholder="Search by class_name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Search by Gender</option>
                                                <option {{ Request::get('gender') == 'male' ? 'selected' : '' }}
                                                    value="male">Male</option>
                                                <option {{ Request::get('gender') == 'female' ? 'selected' : '' }}
                                                    value="female">Female</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Date of birth</label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ Request::get('date_of_birth') }}"
                                                placeholder="Search by date_of_birth">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="Caste">Caste</label>
                                            <input type="text" name="caste" class="form-control"
                                                value="{{ Request::get('caste') }}" placeholder="Search by caste">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Religion</label>
                                            <input type="text" name="religion" class="form-control"
                                                value="{{ Request::get('religion') }}"
                                                placeholder="Search by religion">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Mobile Number</label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ Request::get('mobile_number') }}"
                                                placeholder="Search by mobile_number">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Admission Date</label>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ Request::get('admission_date') }}"
                                                placeholder="Search by admission_date">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="Blood group">Blood group</label>
                                            <input type="text" name="blood_group" class="form-control"
                                                value="{{ Request::get('blood_group') }}"
                                                placeholder="Search by blood_group">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="Status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Search by status</option>
                                                <option {{ Request::get('status') == 1 ? 'selected' : '' }}
                                                    value="1">Active</option>
                                                <option {{ Request::get('status') == 0 ? 'selected' : '' }}
                                                    value="0">In Active</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Date created</label>
                                            <input type="date" name="created_at" class="form-control"
                                                value="{{ Request::get('created_at') }}"
                                                >
                                        </div>

                                        <div class="form-group col-md-3 pt-4">
                                            <button class="btn btn-primary btn-lg">Search</button>
                                            <a href="{{ url('admin/student/list') }}"
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('_message')
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile picture</th>
                                            <th>Student Name </th>
                                            <th>Parent Name </th>
                                            <th>Email</th>
                                            <th>Admission No</th>
                                            <th>Roll No.</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood group</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $value)
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
                                                <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->admission_number }}</td>
                                                <td>{{ $value->roll_number }}</td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ date('d-m-Y ', strtotime($value->date_of_birth)) }}</td>
                                                <td>{{ $value->caste }}</td>
                                                <td>{{ $value->religion }}</td>
                                                <td>{{ $value->mobile_number }}</td>
                                                <td>{{ date('d-m-Y ', strtotime($value->admission_date)) }}</td>
                                                <td>{{ $value->blood_group }}</td>
                                                <td>{{ $value->height }}</td>
                                                <td>{{ $value->weight }}</td>
                                                <td>{{ $value->status == 1 ? 'Active' : 'In Active' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td style="min-width: 150px">
                                                    <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {!! $students->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
