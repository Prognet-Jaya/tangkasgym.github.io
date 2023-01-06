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
          <form action="/update_latihan/{{$edit_latihan->id}}" method="POST">
                                      @method('PUT')
                                        @csrf
                                        <input type="hidden" class="form-control" name ="id"id="id" value="{{$edit_latihan->id}}">
                                        <div class="f">
                                          <label for="recipient-name" class="col-form-label">Training = </label>
                                          <input type="text" class="form-control" name ="nama_training" id="recipient-name" value="{{$edit_latihan->nama_training}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Harga=</label>
                                          <input type="number" class="form-control"name ="harga_training" id="recipient-name" value="{{$edit_latihan->harga_training}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Slot member</label>
                                          <input type="number" class="form-control" name ="slot" id="recipient-name"
                                          value="{{$edit_latihan->slot}}">
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