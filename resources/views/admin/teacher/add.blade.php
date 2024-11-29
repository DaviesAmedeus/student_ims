<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary">

                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Profile picture</label>
                                            <input type="file" name="profile_picture" class="form-control"
                                                value="{{ old('profile_picture') }}" >
                                            <div class="text-danger">{{ $errors->first('profile_picture') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input type="name" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Enter first name..." required>
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Middle Name</label>
                                            <input type="name" name="middle_name" class="form-control"
                                                value="{{ old('middle_name') }}" placeholder="Enter middle name...">
                                            <div class="text-danger">{{ $errors->first('middle_name') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="name" name="last_name" class="form-control"
                                                value="{{ old('last_name') }}" placeholder="Enter last name..." required>
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Enter first email..." required>
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control"
                                                value="{{ old('password') }}" placeholder="Enter password..." required>
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" required>
                                                <option value="">---Select status---</option>
                                                <option {{ (old('status')==0) ? 'selected' : '' }} value="0">In Active</option>
                                                <option {{ (old('status')==1) ? 'selected' : '' }} value="1">Active</option>
                                            </select>
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">---Select Gender---</option>
                                                <option {{ (old('gender')=='male') ? 'selected' : '' }} value="male">Male</option>
                                                <option {{ (old('gender')=='female') ? 'selected' : '' }} value="female">Female</option>
                                            </select>
                                            <div class="text-danger">{{ $errors->first('gender') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Marital Status</label>
                                            <input type="text" name="marital_status" class="form-control"
                                                value="{{ old('marital_status') }}" placeholder="Enter marital_status..." required>
                                            <div class="text-danger">{{ $errors->first('marital_status') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Phone number</label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ old('mobile_number') }}" placeholder="Enter phone number..." required>
                                            <div class="text-danger">{{ $errors->first('mobile_number') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Current Address</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ old('address') }}" placeholder="Enter Adress..." required>
                                            <div class="text-danger">{{ $errors->first('address') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Permanent Address</label>
                                            <input type="text" name="permanent_address" class="form-control"
                                                value="{{ old('permanent_address') }}" placeholder="Enter Adress..." required>
                                            <div class="text-danger">{{ $errors->first('permanent_address') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Work Experience</label>
                                            <input type="text" name="experience" class="form-control"
                                                value="{{ old('experience') }}" placeholder="Enter experience..." required>
                                            <div class="text-danger">{{ $errors->first('experience') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Qualification</label>
                                            <input type="text" name="qualification" class="form-control"
                                                value="{{ old('qualification') }}" placeholder="Enter qualification..." required>
                                            <div class="text-danger">{{ $errors->first('qualification') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date of Birth<span class="text-danger">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ old('date_of_birth') }}"  required>
                                            <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date of Joining<span class="text-danger">*</span></label>
                                            <input type="date" name="joining_date" class="form-control"
                                                value="{{ old('joining_date') }}"  required>
                                            <div class="text-danger">{{ $errors->first('joining_date') }}</div>
                                        </div>
                                    </div>








                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary col-4">Add Teacher</button>
                                      </div>

                                </div>
                            </form>
                        </div>




                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-layout>
