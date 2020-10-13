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
                <h3 class="card-title">Edit Product</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('products.update',['id'=> $product->id])}}"  enctype="multipart/form-data" >
                @csrf
                @method("put")
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" value="{{$product->prod_name}}" id="exampleInputEmail1" name="prod_name" placeholder="Enter Product name">
                    @error('prod_name')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea name="prod_description" class="form-control">{{$product->prod_description}}</textarea>
                    @error('prod_desc')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Old Price</label>
                  <input type="text" class="form-control" value="{{$product->prod_old_price}}" id="exampleInputEmail1" name="prod_old_price" placeholder="Enter Old Price">
                    @error('prod_old_price')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product New Price</label>
                  <input type="text" class="form-control" value="{{$product->prod_new_price}}" id="exampleInputEmail1" name="prod_new_price" placeholder="Enter New Price">
                    @error('prod_new_price')
                        <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="cat">
                        @foreach ($categories as $cat)
                          <option value="{{$cat->id}}" @if ($cat->id == $product->cat_id)
                            selected
                          @endif>{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Status</label>
                  <input type="text" class="form-control" value="{{$product->prod_status}}" id="exampleInputEmail1" name="prod_status" placeholder="Enter Product Status">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country Made</label>
                  <input type="text" class="form-control" value="{{$product->country_made}}" id="exampleInputEmail1" name="country_made" placeholder="Enter Country Made">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Related</label>
                    <select class="form-control" name="prod_related">
                      @foreach ($all_related as $rel)
                          <option value="{{$rel->id}}" @if ($rel->id == $product->cat_id)
                            selected
                          @endif>{{$rel->name}}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Availabe</label>
                    <select class="form-control" name="prod_available">
                      <option value="1"  @if ($product->availability == 1)
                        selected
                      @endif>Available</option>
                      <option value="0" @if ($product->availability == 0)
                        selected
                      @endif>Not Available</option>
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
                  <button type="submit" name="U_prod" class="btn btn-primary">Update Product</button>
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