<!DOCTYPE html>
<html lang="en">
  @include('trainer.trainer_css')
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('trainer.trainer_sidebar')
      <!-- partial -->
      @include('trainer.trainer_header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @foreach($jadwal_training as $aj)
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="/latihan/{{$aj->gambar}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{$aj->nama_training}}</h5>
                    <h5 class="card-title">{{$aj->hari}}</h5>
                    <h5 class="card-title">{{$aj->jam_awal}}</h5>
                    <h5 class="card-title">{{$aj->jam_akhir}}</h5>
                    <h5 class="card-title"></h5>
                    
                    <a href="/list_mbr/{{$aj->id_latihan}}" class="btn btn-primary">List Member</a>
                  </div>
                </div>
                  
                @endforeach
            </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('trainer.trainer_script')
    <!-- End custom js for this page -->
  </body>
</html>