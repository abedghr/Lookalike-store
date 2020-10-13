@include('Admin.includes.admin_header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Categories</h1>
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
                <h3 class="card-title">Add New Category</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('categories.store')}}"  enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="cat_name" placeholder="Enter Admin name">
                    @error('cat_name')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputFile">Category Image</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" name="cat_image" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="C_category" class="btn btn-primary">Create Category</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</section>
<!-- /.col -->
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Categories</h3>

        <div class="card-tools">
          <ul class="pagination pagination-sm float-right">
            {!! $categories->links() !!}
          </ul>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table text-center">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Created At</th>
              <th style="width: 40px">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php $i=1;?>
              @foreach ($categories as $cat)
              <tr>
                <td>{{$i}}</td>
                <td>
                <img src="../../storage/Category_images/{{$cat->cat_image}}" width="60" height="60" class="rounded-circle" alt="">
                </td>
                <td>{{$cat->cat_name}}</td>
                <td>{{$cat->created_at->format('h:i')}}</td>
                <td style="width:200px;">
                <a href="{{route('categories.edit',['id'=> $cat->id])}}" class="btn btn-info">Update</a>
                <form method="post" action="{{route('categories.destroy',['id'=>$cat->id])}}" style="display: inline">
                    @csrf
                    @method('delete')
                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger">DELETE</button>
                </form>
                </td>
              </tr>
              <?php $i++; ?>
              @endforeach
              
              
              
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>

@include('Admin.includes.admin_footer')