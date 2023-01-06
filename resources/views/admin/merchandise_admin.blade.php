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
              @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session()->get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
              </div>
              @endif
              <a href=""class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</a>
              @foreach($merch as $nb)
              <div class="container mx-auto mt-4">
                  <div class="row">
                    <div class="col-md-4">
                      <table>
                        <tr>
                        <div class="card" style="width: 18rem;">
                                <img src="/latihan/{{$nb->gambar}}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$nb->nama_merchandise}}</h5>
                              <h5 class="card-title">Rp.{{$nb->harga}}</h5>
                              <h5 class="card-title"> sisa stok {{$nb->stok}}</h5>
                              <h5 class="card-title"> sisa stok {{$nb->stok}}</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Deskripsi :</h6>
                              <p class="card-text">{{$nb->merk_merchandise}}</p>
                              
                              <form action="/delete_merchandise/{{$nb->id}}" method="POST">
                                      @method('delete')
                                        @csrf
                                 <input type="submit" name ="submit" class="btn btn-danger" value="delete" onclick="return confirm('Apakah anda ingin menghapus')">
                            </form>
                              <br>
                              <a href="/edit_merchandise/{{$nb->id}}" class="card-link">Edit</a>
                      
                          </div>
                          </div>
                        </tr>
                      </table>
                              
                    </div>    
              
                  
                </div>
               </div>
               
               @endforeach
            </div>
        </div>
       
                      
                                 
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
      
      $(document).ready(function () {
            $(document).on('click','.editlah', function () {
              var id=$(this).val();
              $('#up').modal('show');
              $.ajax({
                type: "method",
                url: "url",
                data: "data",
                dataType: "dataType",
                success: function (response) {
                  
                }
              });
            });
          });
        
       
  </script>
    @include('admin.js')
    <!-- End custom js for this page -->
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
                                      <form action="/tambah_merchandise" method="post" enctype="multipart/form-data">
                                        @method('post')
                                        @csrf
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Training</label>
                                          <input type="text" class="form-control" name ="nama_merchandise"id="recipient-name" value="">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">harga</label>
                                          <input type="number" class="form-control"name ="harga" id="recipient-name">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Sisa Slot</label>
                                          <input type="number" class="form-control" name ="stok" id="recipient-name">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Merk</label>
                                          <textarea class="form-control" name ="merk_merchandise" id="recipient-name"></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Jenis</label>
                                          <textarea class="form-control" name ="jenis_merchandise" id="recipient-name"></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Masukan Gambar</label>
                                          <input type="file" class="form-control" name ="gambar" id="recipient-name">
                                        </div>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">keluar</button>
                                      <input type="submit" name ="submit" class="btn btn-primary" value="Simpan" >
                                      </form>
                                      <div class="modal-footer">
                      
                                    </div>
                                    </div>
                                
                                  </div>
                                </div>
                          </div>
  </body>
  <!-- <script src="home/js/jquery.min.js">
        $(document).ready(function(){
          $(selector).on('click','editbtn', function(){
            var id_user=$(this).val();
            alert(id_user);
          });
        });
      </script> -->
        
  
</html>