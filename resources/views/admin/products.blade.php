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

          <div class="container ml-5 my-4">
            <div class="row ">
                <div class="col-6">
                    <h1>Add Products</h1>

                    <br>

                    <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Product title" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Product Descriptions</label>
                            <input type="text" name="description" class="form-control" placeholder="Product Descriptions" id="">
                        </div>
                                               <div class="form-group">
                            <label for="">Product category</label>
                            <!-- <input type="text" name="category" class="form-control" placeholder="Product category" id=""> -->
                            <select name="category" class="form-control" id="">
                                <option value="">Add Category here</option>
                                @foreach($category as $d)

                                    <option value="{{$d->category_name}}">{{$d->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Product quentity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Product quantity" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Product price</label>
                            <input type="number" name="price" class="form-control" placeholder="Product price" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Product discount_price</label>
                            <input type="number" name="discount_price" class="form-control" placeholder="Product discount_price" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Product Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Product title" id="">
                        </div>

<br>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure to add this category')" id="">
                        </div>


                        
                    </form>
                </div>


            </div>
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