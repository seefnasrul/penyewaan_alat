@extends('layouts.market-master')
  @section('content')

  <!-- Page Content -->
    <div class="row">

      <div class="col-lg-3">

        <h4 class="my-4">Kategori Alat</h4>
        <div class="list-group">

          @foreach ($jenis as $j)
        <a href="{{route('market.home')}}?category={{$j->id}}" class="list-group-item">{{$j->nama}}</a>
          @endforeach
        
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <h1>Top Sales</h1>
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            
            @foreach ($top_sales as $key => $item)
              <div class="carousel-item @if($key==0) active @endif">
                <img class="d-block img-fluid" src="{{url('uploads/'.$item->image)}}" alt="First slide" style="width:100%;height:300px;">
                <div class="carousel-caption">
                
                  <h3 style="background:grey;">{{$item->tipe}}</h3>
                  <p style="background:grey;">{{format_rupiah($item->harga_sewa_perhari)}}</p>    
                
                </div>
              </div>  
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <h1>All Sales</h1>
        <div class="row">
          @foreach ($data as $item)
          <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="{{route('market.detail',['id'=>$item->id])}}"><img class="card-img-top" src="{{url('uploads/'.$item->image)}}" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="{{route('market.detail',['id'=>$item->id])}}">{{$item->tipe}}</a>
                      </h4>
                      <h5>{{format_rupiah($item->harga_sewa_perhari)}} / Hari</h5>
                      <p class="card-text">{{substr($item->keterangan,0,20)}}</p>
                    <p class="card-text">Kategori : <a href="{{route('market.home')}}?category={{$item->jenis_id}}">Penggali</a></p>
                    <p class="card-text">Milik <b>{{$item->nama_perusahaan}}</b></p>
                    </div>
                    {{-- <div class="card-footer">
                      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div> --}}
                  </div>
                </div>
            </a>
          @endforeach
          
        
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

@endsection