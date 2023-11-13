<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
     
      
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
       
    <div class="main-panel">
          <div class="content-wrapper">

          <h1>All Orders</h1>
                    <br>
            <div class="contianer my-4" >
                <div class="row">
                    
                    <div class="col-md-8 mr-5">
                        <table class="table align-middle table-bordered table-sm table-responsive" style="width:50%;">
                        <thead>    
                        <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment status</th>
                                <th>Delivery status</th>
                                <th>Image</th>
                                <th>Delevered</th>
                            </tr>
                            <thead>
                            @foreach($orders as $order)
                            <tbody>
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                <td>
                                    <img src="/product/{{$order->image}}" width="100px" height="100px" alt="">
                                </td>
                                <td>
                                    <a href="{{url('delivered', $order->id)}}" class="btn btn-primary">Delivered</a>
                                </td>
                            </tr>
                            </tbody>   
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        
            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
   
   @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>