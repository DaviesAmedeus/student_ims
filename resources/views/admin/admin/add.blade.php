@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Admin</h1>
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
                        <label >Name</label>
                        <input type="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name">
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                      </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"  placeholder="Enter email">
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Password">
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
@endsection
