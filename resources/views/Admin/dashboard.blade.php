
  @include('Admin.includes.admin_header')
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$new_orders}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$all_orders}}</h3>

                <p> All Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>JD{{$total_sales}}</h3>

                <p>Total Sales</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$products}}</h3>

                <p>All Products</p>
              </div>
              <div class="icon">
                <i class="fa fa-product-hunt"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 {{-- connectedSortable --}}">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Last 5 Orders
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <table class="table text-center">
                    <tbody>
              @foreach ($new_orders_data as $order)
              <?php $count_products=(count(explode(' ',$order->products))); ?>
              <tr>
                <input type="hidden" value="{{$order->id}}" id="order_id">
                <td>{{$order->fname}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->Address}}</td>
                <td><a href="{{route('orders.show',['products'=>$order->products])}}" class="badge badge-secondary text-light">({{$count_products}}) View Orders</a></td>
                <td>JD{{$order->total_price}}</td>
                @if ($order->order_done == 0)
                <td style="width:300px;" id="first_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="accept_order" onclick="accept_order({{$order->id}})" style="display: inline">Accept</a>
                    <a class="btn btn-danger text-light" id="decline_order" onclick="decline_order({{$order->id}})" style="display: inline">Decline</a>
                </td>
                <td style="width: 300px; display:none;" id="second_state1{{$order->id}}">
                    <a class="btn btn-primary text-light" id="delivery_process" onclick="delivery_process({{$order->id}})" style="display: inline">Delivery Process</a>
                </td>
                <td style="width: 300px; display:none;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                <td style="width: 300px; display:none;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>    
                @endif
                @if ($order->order_done == 1)
                <td style="width: 300px;" id="second_state1{{$order->id}}">
                    <a class="btn btn-primary text-light" id="delivery_process" onclick="delivery_process({{$order->id}})" style="display: inline">Delivery Process</a>
                </td>
                <td style="width: 300px; display:none;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                <td style="width: 300px; display:none;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
                @if ($order->order_done == -1)
                <td style="width: 300px;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                @endif
                @if ($order->order_done == 2)
                <td style="width: 300px;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 300px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
                @if ($order->order_done == 3)
                <td style="width: 300px;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                @endif
                @if ($order->order_done == -2)
                <td style="width: 300px;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
              </tr>
              @endforeach
              
              
              
                    </tbody>
                  </table>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!--*************** Direct Chat Box *********************-->

            


            <!--************* TO DO List ***************-->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('Admin.includes.admin_footer')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script>
      
      function accept_order(id){
          var order_id = id;  
              $.ajax({
                  type: "GET",
                  url: "{{route('orders.accept')}}",
                  data:{
                      "id": order_id
                  },
                  success:function(data){
                      $("#second_state1"+id).show();
                      $("#second_state2"+id).hide();
                      $("#first_state"+id).hide();
                      $("#third_state"+id).hide();
                      $("#fourth_state1"+id).hide();
                      $("#fourth_state2"+id).hide();
                  }
              });
      }
  
      function decline_order(id){
          var order_id = id;  
              $.ajax({
                  type: "GET",
                  url: "{{route('orders.decline')}}",
                  data:{
                      "id": order_id
                  },
                  success:function(data){
                      $("#second_state2"+id).show();
                      $("#second_state1"+id).hide();
                      $("#first_state"+id).hide();
                      $("#third_state"+id).hide();
                      $("#fourth_state1"+id).hide();
                      $("#fourth_state2"+id).hide();
                  }
              });
      }
  
      function delivery_process(id){
          
          var order_id = id;  
              $.ajax({
                  type: "GET",
                  url: "{{route('orders.delivery_process')}}",
                  data:{
                      "id": order_id
                  },
                  success:function(data){
                      $("#second_state2"+id).hide();
                      $("#second_state1"+id).hide();
                      $("#first_state"+id).hide();
                      $("#fourth_state1"+id).hide();
                      $("#fourth_state2"+id).hide();
                      $("#third_state"+id).show();
                  }
              });
      }
      function received_order(id){
          var order_id =id;  
              $.ajax({
                  type: "GET",
                  url: "{{route('orders.received')}}",
                  data:{
                      "id": order_id
                  },
                  success:function(data){
                      $("#second_state2"+id).hide();
                      $("#second_state1"+id).hide();
                      $("#first_state"+id).hide();
                      $("#third_state"+id).hide();
                      $("#fourth_state1"+id).show();
                      $("#fourth_state2"+id).hide();
                  }
              });
      }
      function unreceived_order(id){
          var order_id = id;  
              $.ajax({
                  type: "GET",
                  url: "{{route('orders.unreceived')}}",
                  data:{
                      "id": order_id
                  },
                  success:function(data){
                      $("#second_state2"+id).hide();
                      $("#second_state1"+id).hide();
                      $("#first_state"+id).hide();
                      $("#third_state"+id).hide();
                      $("#fourth_state1"+id).hide();
                      $("#fourth_state2"+id).show();
                  }
              });
      }
  </script>