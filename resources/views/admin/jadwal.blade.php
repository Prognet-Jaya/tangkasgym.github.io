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
          
            <a href=""class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</a>
            @foreach($jadwal_training as $d)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/latihan/{{$d->gambar}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$d->nama_training}}</h5>
                    <h5 class="card-title">{{$d->Nama_trainer}}</h5>
                    <h5 class="card-title">{{$d->hari}}</h5>
                    <h5 class="card-title">{{$d->jam_awal}}</h5>
                    <h5 class="card-title">{{$d->jam_akhir}}</h5>
                </div>
                <div class="card-body">
                    <a href="/daftar_member/{{$d->id_latihan}}" class="card-link">Member</a>
                    <a href="/jadwal/{{$d->id_jadwal}}/edit" class="card-link">Edit</a>
                    <a href="#" class="card-link">Hapus</a>
                </div>
                </div>
                @endforeach

                
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Tambah Training</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="/tambah_jadwal" method="POST">
                                     
                                     @csrf
                                    
                                     <!-- <input type="hidden" class="form-control" name ="id"id="id" value=""> -->
                                     <div class="form-group">
                                       <label for="recipient-name" class="col-form-label">training</label>
                                     </div>

                                     <div class="form-group">
                                     <label for="training">training:</label>
                                     <select name="training">
                                      @foreach($daftar_training as $hg)
                                      
                                        <option value="{{$hg->id}}">{{$hg->nama_training}}</option>
                                       
                                        @endforeach
                                        </select>
                                     <label for="trainer">trainer:</label>
                                     <select name="trainer" >
                                      @foreach($trainer as $t)

                                     
                                        <option value="{{$t->id}}">{{$t->Nama_trainer}}</option>
                                        
                                        @endforeach
                                        </select>
                                     <label for="hari">hari:</label>
                                            
                                        <select name="hari">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                        </select>
                                     </div>

                                     <div class="form-group">
                                       <label for="recipient-name" class="col-form-label">Jam awal</label>
                                       <input type="time" class="form-control" name ="jam_awal" id="recipient-name" value="">
                                     </div>

                                     <div class="form-group">
                                       <label for="recipient-name" class="col-form-label">Jam akhir</label>
                                       <input type="time" class="form-control" name ="jam_akhir" id="recipient-name" value="">
                                     </div>

                                   <input type="submit" name ="submit" class=" btn btn-primary" value="simpan" >
                                </form>
                                      <div class="modal-footer">
                      
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