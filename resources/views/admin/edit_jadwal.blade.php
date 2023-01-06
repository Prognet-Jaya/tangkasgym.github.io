<!DOCTYPE html>
<html lang="en">
  <base href="/public">
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
            <form action="/update_jadwal/{{$edit->id}}" method="POST">
                                     
                                     @csrf
                                     @method('PUT')
                                     <!-- <input type="hidden" class="form-control" name ="id"id="id" value=""> -->
                                     <div class="form-group">
                                       <label for="recipient-name" class="col-form-label">training</label>
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
                                       <input type="time" class="form-control" name ="jam_awal" id="recipient-name" value="{{$edit->jam_awal}}">
                                     </div>

                                     <div class="form-group">
                                       <label for="recipient-name" class="col-form-label">Jam akhir</label>
                                       <input type="time" class="form-control" name ="jam_akhir" id="recipient-name" value="{{$edit->jam_akhir}}">
                                     </div>
                                   <input type="submit" name ="submit" class=" btn btn-primary" value="update" >
                                </form>
                                <a href="{{url('jadwal_latihan')}}"><button type="button" class="btn btn-light">Kembali</button></a>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>