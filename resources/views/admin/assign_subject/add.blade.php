<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Subject to a Class</h1>
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
                                        <label>Class Name</label>
                                        <select name="class_id" id="" class="form-control">
                                            <option value="">-- Select Class --</option>

                                            @foreach ( $classes as $class )
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">{{ $errors->first('class_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject Name</label>

                                            @foreach ( $subjects as $subject )
                                            <div>
                                                <label style="font-weight: normal;">
                                                    <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        <div class="text-danger">{{ $errors->first('subject_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">In Acive</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('status') }}</div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
