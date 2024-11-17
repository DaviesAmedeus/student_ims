<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit assigned Subject to a Class</h1>
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
                                        <select name="class_id" id="" class="form-control" >
                                            @foreach ( $classes as $class )
                                                @if ($class_subject->class_id== $class->id)
                                                    <option {{ ($class_subject->class_id== $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="text-danger">{{ $errors->first('class_id') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <select name="subject_id" id="" class="form-control" >
                                            @foreach ( $subjects as $subject )
                                                {{-- @if ($subject->id== $class_subject->subject_id) --}}
                                                    <option {{ ($class_subject->subject_id== $subject->id) ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                        <div class="text-danger">{{ $errors->first('class_id') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option {{ ($class_subject->status== 1) ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ ($class_subject->status== 0) ? 'selected' : '' }} value="0">In Acive</option>
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
