<!DOCTYPE html>
<html lang="en">
  @include('user.user_css')
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('user.user_sidebar')
      <!-- partial -->
      @include('user.user_header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @foreach($merch as $rt)
               
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/latihan/{{$rt->gambar}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$rt->nama_merchandise}}</h5>
                        <h5 class="card-title">Harga : {{$rt->harga}}</h5>
                        <h5 class="card-title">Merk Merchandise: {{$rt->merk_merchandise}}</h5>
                    </div>
                    <button type="button" class="merchbutton">Join</button>
                    </div>
                
                @endforeach
            </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('user.user_script')
    <!-- End custom js for this page -->
  </body>
</html>