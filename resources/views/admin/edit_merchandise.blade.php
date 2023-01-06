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
          <form action="/update_merchandise/{{$edit_merchandise->id}}" method="POST">
                                      @method('PUT')
                                        @csrf
                                        <input type="hidden" class="form-control" name ="id"id="id" value="{{$edit_merchandise->id}}">
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Nama Merchandise = </label>
                                          <input type="text" class="form-control" name ="nama_merchandise"id="recipient-name" value="{{$edit_merchandise->nama_merchandise}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Harga=</label>
                                          <input type="number" class="form-control"name ="harga" id="recipient-name" value="{{$edit_merchandise->harga}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Stok merchandise</label>
                                          <input type="number" class="form-control" name ="stok" id="recipient-name"
                                          value="{{$edit_merchandise->stok}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">merk merchandise</label>
                                          <input type="text" class="form-control" name ="merk_merchandise" id="recipient-name"
                                          value="{{$edit_merchandise->stok}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Jenis Merchandise</label>
                                          <input type="text" class="form-control" name ="jenis_merchandise" id="recipient-name"
                                          value="{{$edit_merchandise->jenis_merchandise}}">
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