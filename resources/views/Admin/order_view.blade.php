@include('Admin.includes.admin_header')


<div class="content-wrapper mt-5">
<!-- /.col -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header  bg-secondary text-light">
            <h3 class="card-title">Order Products</h3>
        </div>
        <div class="card-body p-0">
            <table class="table text-center">
            <tbody>
                <?php $i=1;?>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$i}}</td>
                    <td>
                        <a href="../../storage/Product_images/{{$order['prod_image']}}">
                        <img src="../../storage/Product_images/{{$order['prod_image']}}" width="80" height="80" class="rounded" alt="">
                        </a>
                    </td>
                    <td><strong>{{$order['prod_name']}}</strong></td>
                    <td><strong>{{$order['prod_description']}}</strong></td>
                    <td><strong>JD{{$order['prod_new_price']}}</strong></td>
                    <td><strong>{{$order['created_at']->format('h:i')}}</strong></td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</div>

@include('Admin.includes.admin_footer')