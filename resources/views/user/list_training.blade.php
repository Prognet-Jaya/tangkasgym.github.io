@extends('layouts.layout')
  @section('container')
            
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @foreach($daftar_training as $x)
          
          <div class="container mx-auto mt-4">
            <div class="row">
              <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                          <img src="/latihan/{{$x->gambar}}" class="card-img-top" alt="...">
                      <div class="card-body">
                      <h5 class="card-title">{{$x->nama_training}}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Deskripsi :</h6>
                      <p class="card-text">{{$x->deskripsi}}</p>
                      <form action="/order/{{$x->id}}" method="post">
                        @csrf
                        <a><button class="listbutton"  type="submit">Join</button></a>
                      </form>

                      <!-- <form action="/add_cart/{{$x->id}}" method="post">
                        @csrf
                        <a class="btn "> <i class="glyphicon glyphicon-shopping-cart"></i> <button class="btn btn-outline-primary btn-sm mt-2" type="submit">add cart</button></a>
                      </form> -->
                
                    </div>
                    </div>
              </div>    
        
             
          </div>
            </div>
                @endforeach
            </div>
          
        <!-- content wrapper stop div -->
          </div>
          <!-- main panel stop div -->
        </div>
        @if(session('alert-success'))
      <script>alert("{{session('alert-success')}}")</script>
    @elseif(session('alert-failed'))
    <script>alert("{{session('alert-failed')}}")</script>
    @endif
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @endsection