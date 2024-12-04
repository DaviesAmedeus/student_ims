<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
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

                        <div class="card card-primary">

                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Profile picture</label>
                                            <div class="d-flex align-items-center">
                                                @if (!empty($getRecord->getProfilePicture()))
                                                    <div class="p-2">
                                                        <img src="{{ $getRecord->getProfilePicture() }}" class="img-thumbnail img-circle mt-2" style="width:100px; height:100px;" alt="">
                                                    </div>
                                                @endif
                                                <div>
                                                    <input type="file" name="profile_picture" class="form-control"
                                                    value="{{ old('caste') }}" >
                                                <div class="text-danger">{{ $errors->first('profile_picture') }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Zero row-->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input type="name" name="name" class="form-control"
                                                value="{{ old('name', $getRecord->name )}}" placeholder="Enter first name..." required>
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Middle Name</label>
                                            <input type="name" name="middle_name" class="form-control"
                                                value="{{ old('middle_name', $getRecord->middle_name) }}" placeholder="Enter middle name...">
                                            <div class="text-danger">{{ $errors->first('middle_name') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="name" name="last_name" class="form-control"
                                                value="{{ old('last_name', $getRecord->last_name) }}" placeholder="Enter last name..." required>
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        </div>

                                    </div>

                                    <!-- First row-->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $getRecord->email) }}" placeholder="Enter first email..." required>
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        </div>





                                    </div>



                                     <!-- Third row-->
                                     <div class="row">



                                        <div class="form-group col-md-4">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">---Select Gender---</option>
                                                <option {{ (old('gender', $getRecord->gender)=='male') ? 'selected' : '' }} value="male">Male</option>
                                                <option {{ (old('gender', $getRecord->gender)=='female') ? 'selected' : '' }} value="female">Female</option>
                                            </select>
                                            <div class="text-danger">{{ $errors->first('gender') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Date of Birth<span class="text-danger">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"  required>
                                            <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
                                        </div>


                                    </div>

                                    <!-- Fourth row-->
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label>Caste</label>
                                            <input type="text" name="caste" class="form-control"
                                                value="{{ old('caste', $getRecord->caste) }}" placeholder="Enter caste...">
                                            <div class="text-danger">{{ $errors->first('caste') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Religion</label>
                                            <input type="text" name="religion" class="form-control"
                                                value="{{ old('religion', $getRecord->religion) }}" placeholder="Enter religion...">
                                            <div class="text-danger">{{ $errors->first('religion') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Blood Group</label>
                                            <input type="text" name="blood_group" class="form-control"
                                                value="{{ old('blood_group', $getRecord->blood_group) }}" placeholder="Enter student blood_group...">
                                            <div class="text-danger">{{ $errors->first('blood_group') }}</div>
                                        </div>



                                    </div>

                                    <!-- Fifth row-->
                                    <div class="row">





                                        <div class="form-group col-md-4">
                                            <label>Height</label>
                                            <input type="number" name="height" class="form-control"
                                                value="{{ old('height', $getRecord->height) }}" placeholder="Enter student height...">
                                            <div class="text-danger">{{ $errors->first('height') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Weight</label>
                                            <input type="number" name="weight" class="form-control"
                                                value="{{ old('weight', $getRecord->weight) }}" placeholder="Enter student weight....">
                                            <div class="text-danger">{{ $errors->first('weight') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Phone number</label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ old('mobile_number', $getRecord->mobile_number) }}" placeholder="Enter phone number...">
                                            <div class="text-danger">{{ $errors->first('mobile_number') }}</div>
                                        </div>

                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary col-4">Update My Infomation</button>
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
