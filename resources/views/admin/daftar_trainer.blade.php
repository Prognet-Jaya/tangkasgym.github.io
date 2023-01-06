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
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Daftar Trainer</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <!-- <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th> -->
                            <th> Nama Lengkap</th>
                            <th> Umur</th>
                            <th> Jenis kelamin</th>
                            <th> Jenis Trainer</th>
                            <th> Telepon</th>
                            <th> Alamat</th>
                            <th> Username </th>
                            <th> actiion </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($daftar_trainer as $t)
                          <tr>
                            <!-- <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td> -->
                            <td>
                
                              <span class="ps-2">{{$t->Nama_trainer}}</span>
                            </td>
                            <td> {{$t->Umur_trainer}} </td>
                            <td> {{$t->jk}}</td>
                            <td> {{$t->jenis}}</td>
                            <td> {{$t->telepon_trainer}} </td>
                            <td> {{$t->alamat_trainer}}</td>
                            <td>
                                {{$t->name}}
                            </td>
                            <td>
                            <a href="/edit_trainer/{{$t->id_trn}}" class="btn btn-primary">Edit</a>
                            <form action="/hapus_trainer/{{$t->id_trn}}" method="POST">
                                      @method('delete')
                                        @csrf
                                 <input type="submit" name ="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Apakah anda ingin menghapus')">
                            </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                                      <form action="/tambah_trainer" method="post" enctype="multipart/form-data">
                                        @method('post')
                                        @csrf
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Nama Trainer</label>
                                          <input type="text" class="form-control" name ="Nama_trainer"id="recipient-name" value="">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Umur</label>
                                          <input type="number" class="form-control"name ="Umur_trainer" id="recipient-name">
                                        </div>

                                        <select name="jk">
                                     
                                      
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                      
                                        </select>

                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">daftar user</label>
                                        <select name="id_user">
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
                                          <input type="text" class="form-control" name ="telepon_trainer" id="recipient-name">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Alamat</label>
                                          <input type="text" class="form-control" name ="alamat_trainer" id="recipient-name">
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