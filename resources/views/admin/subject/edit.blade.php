<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Subject</h1>
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

                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <input type="name" name="name" value="{{ old('name', $getRecord->name) }}"
                                            class="form-control" required placeholder="Enter Name">
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject Type</label>
                                        <select name="type" id="" class="form-control"
                                            value="{{ old('type', $getRecord->type) }}">
                                            <option {{ $getRecord->type == 0 ? 'selected' : '' }} value="0">Theory
                                            </option>
                                            <option {{ $getRecord->type == 1 ? 'selected' : '' }} value="1">Practical
                                                active</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('type') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject Status</label>
                                        <select name="status" id="" class="form-control"
                                            value="{{ old('status', $getRecord->status) }}">
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">In
                                                active</option>
                                            <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>

                                        </select>
                                        <div class="text-danger">{{ $errors->first('status') }}</div>
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
