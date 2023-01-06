<!DOCTYPE html>
<html lang="en">
    <base href="/public">
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
                <a href="{{url('your_training')}}"><button type="button"  class="btn btn-secondary">Kembali</button></a>
            
            @foreach($see_jadwal as $vc)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/latihan/{{$vc->gambar}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$vc->nama_training}}</h5>
                    <h5 class="card-title">Trainer: {{$vc->Nama_trainer}}</h5>
                    <h5 class="card-title">Hari: {{$vc->hari}}</h5>
                    <h5 class="card-title">Jam: {{$vc->jam_awal}}-{{$vc->jam_akhir}}</h5>
                </div>
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