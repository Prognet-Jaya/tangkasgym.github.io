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
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Latihan</h4>
                    <div class="table-responsive">
                      @foreach($jadwal_training as $b)
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Training </th>
                            <th> Hari </th>
                            <th> Jam awal </th>
                            <th> Jam Akhir </th>
                            <th> Ajukan ganti jadwal </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face1.jpg" alt="image" />
                              <span class="ps-2">{{$b->nama_training}}</span>
                            </td>
                            <td> {{$b->hari}} </td>
                            <td> {{$b->jam_awal}}</td>
                            <td> {{$b->jam_akhir}} </td>
                        
                            <td>
                            <a href="/gt_pengajuan/{{$b->id_jadwal}}" class="badge badge-outline-success">Ajukan</a>
                            
                              
                            </td>
                          </tr>
                          

                        </tbody>
                      </table>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
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