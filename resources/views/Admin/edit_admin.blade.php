@include('Admin.includes.admin_header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Admin</h1>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('admins.update',['id'=> $admin->id])}}"  enctype="multipart/form-data" >
                @csrf
                @method("put")
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                  <input type="text" class="form-control" value="{{$admin->name}}" id="exampleInputEmail1" name="admin_name" placeholder="Enter Admin name">
                    @error('admin_name')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                  <input type="email" class="form-control" value="{{$admin->email}}" id="exampleInputEmail1" name="email" placeholder="Enter Admin email">
                    @error('email')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Admin Password</label>
                  <input type="password" class="form-control"  id="exampleInputPassword1" name="password" placeholder="Enter a new admin password if you want to change it">
                    @error('password')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Admin Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="C_Admin" class="btn btn-primary">Update Admin</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</section>
<!-- /.col -->
</div>
@include('Admin.includes.admin_footer')