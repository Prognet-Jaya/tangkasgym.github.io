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
            <a href=""class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</a>
                @foreach($latihan as $d)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Nama: {{$d->nama_lengkap}}</h5>
                    </div>
                </div>
                    
                @endforeach
            </div>
            <a href="{{url('jadwal_latihan')}}" class="btn btn-primary">Kembali</a>
            
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
                                   
                                      <form action="/tambahmember_jadwal/{{$id}}" method="post" enctype="multipart/form-data">
                                     

                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Pilih User</label>
                                        <select name="id_user">
                                      @foreach($user as $bc)
                                      
                                        <option value="{{$bc->id}}">{{$bc->nama_lengkap}}</option>
                                       
                                        @endforeach
                                        </select>
                                        </div>

                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                      <input type="submit" name ="submit" class="btn btn-primary" value="Simpan" >
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