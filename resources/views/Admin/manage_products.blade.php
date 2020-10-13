@include('Admin.includes.admin_header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Products</h1>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('products.store')}}"  enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="prod_name" placeholder="Enter Admin name">
                    @error('prod_name')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea name="prod_description" class="form-control" id="" id="exampleInputEmail1"></textarea>
                    @error('prod_desc')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Old Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="prod_old_price" placeholder="Enter Old Price">
                    @error('prod_old_price')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product New Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="prod_new_price" placeholder="Enter New Price">
                    @error('prod_new_price')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="cat">
                        @foreach ($categories as $cat)
                          <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Status</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="prod_status" placeholder="Enter Product Status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country Made</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="country_made" placeholder="Enter Country Made">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Related</label>
                    <select class="form-control" name="prod_related">
                      @foreach ($all_related as $rel)
                        <option value="{{$rel->id}}">{{$rel->name}}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_image" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="C_Admin" class="btn btn-primary">Create Product</button>
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
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
          <ul class="pagination pagination-sm float-right">
            {!! $products->links() !!}
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
              <th>Desc</th>
              <th>Old Price</th>
              <th>New Price</th>
              <th>Category</th>
              <th>Availability</th>
              <th style="width: 40px">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php $i=1;?>
              @foreach ($products as $prod)
              <tr>
                <td>{{$i}}</td>
                <td>
                <img src="../../storage/Product_images/{{$prod->prod_image}}" width="60" height="60" class="rounded-circle" alt="">
                </td>
                <td>{{$prod->prod_name}}</td>
                <td>{{$prod->prod_description}}</td>
                <td><del>JD{{$prod->prod_old_price}}</del></td>
                <td>JD{{$prod->prod_new_price}}</td>
                <td>{{$prod->category->cat_name}}</td>
                <td>@if ($prod->availability == 1)
                    <span class="text-success">Available</span>
                @else
                    <span class="text-danger">Un-available</span>
                @endif</td>
                <td style="width:200px;">
                <a href="{{route('products.edit',['id'=> $prod->id])}}" class="btn btn-info">Update</a>
                <form method="post" action="{{route('products.destroy',['id'=>$prod->id])}}" style="display: inline">
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