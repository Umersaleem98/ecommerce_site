<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
            .btn-danger{
                margin-top: 20px;
            }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->



        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">

<span>
    @if(session()->has('message'))
    <div class="alert alert-success">
            {{session()->get('message')}}
    </div>
    @endif
</span>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product quentity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>

                                    <?php $totalprice = 0 ?>
                                    @foreach($carts as $cart)
                                    <tr>

                                        <td>{{$cart->product_title}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>{{$cart->price}}</td>
                                        <td><img src="/product/{{$cart->image}}" alt="" style="width:80px; height:80px"></td>
                                        <td><a href="{{url('remove_cart', $cart->id)}}" 
                                        onclick="return confirm('Are you sure to remove this product?')"
                                        class="btn btn-danger">Remove product</a></td>
                                    </tr>

                                    <?php $totalprice = $totalprice + $cart->price ?>

                                    @endforeach

                                </table>
                                <h1> Total Price {{$totalprice}}</h1>

                            </div>
                            <div class="col-md-3">
                            <h4>Process to Order</h4>

                            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
                            <a href="" class="btn btn-danger">Pay Using Card</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- slider section -->
        <!-- end slider section -->
    </div>
    <!-- why section -->






    @include('home.footer')
    <!-- footer end -->
    @include('home.js')
</body>

</html>