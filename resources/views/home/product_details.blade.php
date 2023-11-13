<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
         @include('home.css')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

      
      



      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%;padding: 30px">
                  <div class="box">
                     
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" alt="" width="400px" height="400px">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$products->title}}
                        </h5>

                        @if($products->discount_price != null)

                        <h6 style="color:red;">
                        discount price
                        <br>
                        {{$products->discount_price}}
                        </h6>
                       
                        <h6 style="text-decoration:line-through; color:blue">
                        price
                        <br>
                        {{$products->price}}
                        </h6>

                        @else

                        <h6 style="color:blue;">
                        price
                        <br>
                        {{$products->price}}
                        </h6>

                        @endif

                        <h6>Product Category: {{$products->category}}</h6>
                        <h6>Product Details: {{$products->description}}</h6>
                        <h6>Availabe quantity: {{$products->quantiry}}</h6>

                        <form action="{{url('add_cart', $products->id)}}" method="post">

                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <input type="number" name="quantity" class="form-control" id="" value="1" min="1" style="width:100px">

                                 </div>
                                 <div class="col-md-4">
                                 <input type="submit" name="submit" class="btn btn-info" value="Add to Cart" >

                                 </div>
                              </div>
                           </form>


                     </div>
                  </div>

               </div>



      @include('home.footer')
      <!-- footer end -->
      @include('home.js')
   </body>
</html>