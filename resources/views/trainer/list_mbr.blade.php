<!DOCTYPE html>
<html lang="en">
<base href="/public">
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
                    <table class="table">
                    <thead>
                        <tr>
                        
                        <th scope="col">Nama_lengkap</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_member as $mbr)
                        <tr>
                        
                        <td>{{$mbr->nama_lengkap}}</td>
                        <td>{{$mbr->umur}}</td>
                        <td>{{$mbr->pekerjaan}}</td>
                        <td>{{$mbr->jenis_kelamin}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <a href="/jadwal_training" method="get">
                        <button type="button"class="btn btn-light">Kembali</button>
                </a>
                    
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