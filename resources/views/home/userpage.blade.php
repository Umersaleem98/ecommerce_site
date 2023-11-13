<!DOCTYPE html>
<html>
   <head>
         @include('home.css')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <!-- slider section -->
         @include('home.slide')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      
      <!-- end why section -->
      @include('home.why')

      
      <!-- arrival section -->
      
      @include('home.arrival')
      
      <!-- end arrival section -->
      
      <!-- product section -->

      @include('home.prpductsec')
      
      <!-- end product section -->

      <!-- subscribe section -->

      @include('home.subscribe')

      <!-- end subscribe section -->
      <!-- client section -->
      
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      
      @include('home.footer')
      <!-- footer end -->
      @include('home.js')
   </body>
</html>