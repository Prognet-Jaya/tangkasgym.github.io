<!DOCTYPE html>
<html lang="en">
 @include('admin.css')
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Latihan</h4>
                    <div class="table-responsive">
                      
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
                            <th> Nama Trainer </th>
                            <th> Hari sebelum - hari diajukan </th>
                            <th> Jam sebelumnya </th>
                            <th> Jam diajukan </th>
                            <th> alasan pengajuan </th>
                            <th> status </th>
                            <th> action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($pengajuan as $b)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <span class="ps-2">{{$b->nama_training}}</span>
                            </td>
                            <td> {{$b->Nama_trainer}} </td>
                            <td> {{$b->hari}}->{{$b->haribaru}} </td>
                            <td> {{$b->jam_awal}}-{{$b->jam_akhir}}</td>
                            <td> {{$b->jam_awalbaru}}-{{$b->jam_akhirbaru}} </td>
                            <td> {{$b->alasan_pengajuan}} </td>
                            <td> {{$b->status_pengajuan}} </td>
                            
                            <td>
                                @if($b->status_pengajuan=='belum')
                            <a href="{{url('ajukan',$b->id_pengajuan)}}"class="badge badge-outline-success">terima</a>
                            <a href="{{url('tolak',$b->id_pengajuan)}}"class="badge badge-outline-danger">tolak</a>
                            @else
                               <h1>telah diproses</h1>
                            </td>
                          </tr>
                            @endif
                          

                        </tbody>
                        @endforeach
                      </table>
                      
                    </div>
                  </div>
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