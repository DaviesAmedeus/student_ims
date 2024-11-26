<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent List <span class="badge badge-secondary"> Total: {{ $parents->total() }}</span> </h1>
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
                                            <label for="">Mobile Number</label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ Request::get('mobile_number') }}"
                                                placeholder="Search by mobile_number">
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label>Occupation</label>
                                            <input type="text" name="occupation" class="form-control"
                                                value="{{ Request::get('occupation') }}" placeholder="Search by occupation">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ Request::get('address') }}" placeholder="Search by address">
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
                                                value="{{ Request::get('created_at') }}">
                                        </div>

                                        <div class="form-group col-md-3 pt-4">
                                            <button class="btn btn-primary btn-lg">Search</button>
                                            <a href="{{ url('admin/parent/list') }}"
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
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile picture</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Created date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parents as $value)
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
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ $value->mobile_number }}</td>
                                                <td>{{ $value->occupation }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ $value->status === 1 ? 'Active' : 'In Active' }}</td>



                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/parent/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/parent/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {!! $parents->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
