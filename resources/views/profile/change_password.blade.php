<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
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
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control"
                                            value="{{ old('name') }}" placeholder="Enter the old password..." required>
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" name="new_password" class="form-control"
                                            value="{{ old('name') }}" placeholder="Enter the new passoword..." required>
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
