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
        <!-- /tambah_pengajuan/{{$jadwal_training->id_jadwal}} -->
            <div class="content-wrapper">
          <form action="/tambah_pengajuan/{{$jadwal_training->id_jadwal}}" method="POST">
                                      @method('PUT')
                                        @csrf
                                        <!-- $gt->alasan_pengajuan=$request->alasan_pengajuan;
        $gt->hari=$request->hari;
        $gt->jam_awal=$request->jam_awal;
        $gt->jam_akhir=$request->jam_akhir;
        $gt->id_trainer=$jadwal_training->id_trainer;
        $gt->id_latihan=$jadwal_training->id_latihan; -->
                                        <input type="hidden" class="form-control" name ="id"id="id" value="">
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Alasan Pengaduan</label>
                                          <input type="text" class="form-control" name ="alasan_pengajuan"id="recipient-name" value="">
                                        </div>

                                        <div class="form-group">
                                     <label for="hari">Hari:</label>

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
                                          <input type="time" class="form-control" name ="jam_awal" id="recipient-name"
                                          value="">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Jam akhir</label>
                                          <input type="time" class="form-control" name ="jam_akhir" id="recipient-name"
                                          value="">
                                        </div>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">keluar</button>
                                      <input type="submit" name ="submit" class="btn btn-primary" value="Simpan" >
                                      </form>
                                      
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