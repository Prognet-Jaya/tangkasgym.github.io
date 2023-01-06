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
          <form action="/update_trainer/{{$edit->id}}" method="POST">
                                      @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Nama Trainer</label>
                                          <input type="text" class="form-control" name ="Nama_trainer"id="recipient-name" value="{{$edit->Nama_trainer}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Umur</label>
                                          <input type="number" class="form-control"name ="Umur_trainer" id="recipient-name" value="{{$edit->Umur_trainer}}">
                                        </div>

                                        <select name="jk" value="{{$edit->jk}}">
                                     
                                      
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                      
                                        </select>

                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">daftar user</label>
                                        <select name="id_user" value="">
                                      @foreach($daftar_user as $tt)
                                      
                                        <option value="{{$tt->id}}">{{$tt->nama_lengkap}}</option>
                                       
                                        @endforeach
                                        </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jenis Trainer</label>
                                        <select name="id_jenis">
                                      @foreach($daftar_jenis as $bc)
                                      
                                        <option value="{{$bc->id}}">{{$bc->jenis}}</option>
                                       
                                        @endforeach
                                        </select>
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Telepon</label>
                                          <input type="text" class="form-control" name ="telepon_trainer" id="recipient-name" value="{{$edit->telepon_trainer}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Alamat</label>
                                          <input type="text" class="form-control" name ="alamat_trainer" id="recipient-name" value="{{$edit->alamat_trainer}}">
                                        </div>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                      <input type="submit" name ="submit" class="btn btn-primary" value="Simpan" >
                                      </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>