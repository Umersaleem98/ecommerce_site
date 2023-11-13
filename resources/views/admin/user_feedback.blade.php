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

            <h1>User Feedback</h1>
            <div class="row my-3">
                <div class="col-8">
                <table class="table">
                <thead>
                    <tr>
                     <th>Name</th>   
                     <th>Email</th>   
                     <th>Subject</th>   
                     <th>Message</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $cont)
                    <tr>
                        <td>{{$cont->name}}</td>
                        <td>{{$cont->email}}</td>
                        <td>{{$cont->subject}}</td>
                        <td>{{$cont->message}}</td>
                    </tr>

                    @endforeach
                </tbody>
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