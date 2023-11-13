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

          <div class="container my-5">
            <div class="row">
                <div class="col-md-7 ">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Dis price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td><img src="/product/{{$product->image}}" width="300px" height="300px" alt=""></td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this')" href="{{url('delete_product', $product->id)}}" class="btn btn-danger">Delete</a>
                            <a onclick="return confirm('Are you sure to delete this')" href="{{url('update_product', $product->id)}}" class="btn btn-info">Update</a>
                        </td>
                    </tr>

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