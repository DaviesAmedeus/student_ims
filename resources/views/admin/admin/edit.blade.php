@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
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
                        <input type="name" name="name" value="{{ $getRecord->name }}" class="form-control" required placeholder="Enter Name">
                      </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" required placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control"  placeholder="Password">
                    <p>Do you want to chane new password, please enter the new password!</p>
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
@endsection
