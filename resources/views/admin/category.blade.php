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
                    <h1>Add category</h1>

                    <br>

                    <form action="{{url('add_category')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="Add Category" id="">
                        </div>
<br>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure to add this category')" id="">
                        </div>
                    </form>
                </div>


            </div>
          </div>

          <div class="container">
            <div class="row">
                <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($category_data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->category_name}}</td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this')" href="{{url('delete_category', $d->id)}}" class="btn btn-danger">Delete</a>
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