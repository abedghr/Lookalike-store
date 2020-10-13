@include('Admin.includes.admin_header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
<!-- /.col -->

<div class="col-md-12 mt-3">
    <div class="card">
      <div class="card-header bg-secondary text-light">
        <div class="row">
            <div class="col-sm-2">
                <h3 class="card-title mt-2"><strong>Orders</strong></h3>
            </div>
            <div class="col-sm-3">
                <select name="" class="form-control" id="">
                    <option value="0">All</option>
                    <option value="1">In Delivery</option>
                    <option value="3">Done</option>
                    <option value="-1">Declined</option>
                    <option value="-2">Failed</option>
                </select>
            </div>
            <div class="col-sm-7">
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                      {!! $orders->links() !!}
                    </ul>
                  </div>
            </div>
        </div>
        

        
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table text-center">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>phone</th>
              <th>address</th>
              <th>Products Order</th>
              <th>Total Price</th>
              <th>Notes</th>
              <th>Created At</th>
              <th>Order Status</th>
            </tr>
          </thead>
          <tbody>
              <?php $i=1;?>
              @foreach ($orders as $order)
              <?php $count_products=(count(explode(' ',$order->products))); ?>
              <tr>
                <td>{{$i}}</td>
                <input type="hidden" value="{{$order->id}}" id="order_id">
                <td>{{$order->fname.' '.$order->lname}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->Address}}</td>
                <td><a href="{{route('orders.show',['products'=>$order->products])}}" class="badge badge-secondary text-light">({{$count_products}}) View Orders</a></td>
                <td>JD{{$order->total_price}}</td>
                <td>{{$order->notes ? $order->notes : '...'}}</td>
                <td>{{$order->created_at->format('Y-m-d')}}</td>
                @if ($order->order_done == 0)
                <td style="width:250px;" id="first_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="accept_order" onclick="accept_order({{$order->id}})" style="display: inline">Accept</a>
                    <a class="btn btn-danger text-light" id="decline_order" onclick="decline_order({{$order->id}})" style="display: inline">Decline</a>
                </td>
                <td style="width: 250px; display:none;" id="second_state1{{$order->id}}">
                    <a class="btn btn-primary text-light" id="delivery_process" onclick="delivery_process({{$order->id}})" style="display: inline">Delivery Process</a>
                </td>
                <td style="width: 250px; display:none;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                <td style="width: 250px; display:none;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>    
                @endif
                @if ($order->order_done == 1)
                <td style="width: 250px;" id="second_state1{{$order->id}}">
                    <a class="btn btn-primary text-light" id="delivery_process" onclick="delivery_process({{$order->id}})" style="display: inline">Delivery Process</a>
                </td>
                <td style="width: 250px; display:none;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                <td style="width: 250px; display:none;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
                @if ($order->order_done == -1)
                <td style="width: 250px;" id="second_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" style="display: inline">Declined</a>
                </td>
                @endif
                @if ($order->order_done == 2)
                <td style="width: 250px;" id="third_state{{$order->id}}">
                    <a class="btn btn-primary text-light" id="received_order" onclick="received_order({{$order->id}})" style="display: inline">Received</a>
                <a class="btn btn-danger text-light" id="unreceived_order" onclick="unreceived_order({{$order->id}})" style="display: inline">Un-received</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                <td style="width: 250px; display:none;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
                @if ($order->order_done == 3)
                <td style="width: 250px;" id="fourth_state1{{$order->id}}">
                    <a class="btn-success text-light p-1 rounded" id="done_order" style="display: inline">Done</a>
                </td>
                @endif
                @if ($order->order_done == -2)
                <td style="width: 250px;" id="fourth_state2{{$order->id}}">
                    <a class="btn-danger text-light p-1 rounded" id="failed_order" style="display: inline">Failed</a>
                </td>
                @endif
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