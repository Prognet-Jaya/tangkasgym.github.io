@extends('layouts.layout')
  @section('container')
            
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @foreach($latihan_user as $bc)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/latihan/{{$bc->gambar}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Latihan: {{$bc->nama_training}}</h5>
                        <h5 class="card-title">Deskripsi: {{$bc->deskripsi}}</h5>
                    </div>
                    <a href="/lihat_jadwal/{{$bc->id_latihan}}">
                      <button type="button" class="btn btn-secondary">Jadwal</button>
                    </a>
                </div>
                    
                @endforeach
            </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @endsection
    