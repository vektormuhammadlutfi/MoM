@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">MOM | Detail MOM</a>
    @include('navbar.navuser')
  </div>
</nav>
@include('navbar.navbg')



{{-- content utama dibawah ini yaa --}}
<div class="card shadow-lg bg-body" style="
  margin: -150px auto 90px auto;
  background: hsla(0, 0%, 100%, 0.8);
  backdrop-filter: blur(30px);
  /* max-width: 1000px; */
  width: 95%">
  <div class="card">
    <div class="card-body">

      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Detail MOM</h3>
        <a href="/mom" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="d-flex justify-content-between">

          <div class="container ">
            <div class="d-flex align-items-center" style="min-height:100px">
              <h4 class="col-4">Oid MOM</h4>
              <p class="col-8">{{$mom->oid_mom}}</p>
            </div>
            <hr class="mt-0">
          </div>

          <div class="container ">
            <div class="d-flex align-items-center" style="min-height:100px">
              <h4 class="col-4">SBU Name</h4>
              <p class="col-8">{{$mom->sbu_name}}</p>
            </div>
            <hr class="mt-0">
          </div>
        </div>

        <div class="container mt-5">
          <div class="row">
            <h4 class="col">Jenis MOM</h4>
            <p class="col">{{$mom->jenis_mom}} </p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Agenda</h4>
            <p class="col">{{$mom->agenda}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Tempat</h4>
            <p class="col">{{$mom->tempat}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Notulen</h4>
            <p class="col">{{$mom->notulen}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Attendees</h4>
            <p class="col">{{$mom->attendees}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Highlight Issues</h4>
            <p class="col">{{$mom->highlight_issues}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Due Date Info</h4>
            <p class="col">{{$mom->due_date_info}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">PIC</h4>
            <p class="col">{{$mom->pic}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Informasi</h4>
            <p class="col">{{$mom->informasi}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Status Issues</h4>
            <p class="col">{{$mom->sts_issue}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="m-0">
            <h4 class="col">Dokumentasi</h4>
            <img src="{{asset('storage/dok-image/'.$mom->gambar)}}" style="max-width:300px" alt="tidak ada foto">
          </div>
        </div>
        <hr class="mt-0">

        <div class="d-flex justify-content-end">
          <a href="/tambahdetail/{{$mom->oid_mom}}" class="btn btn-info py-1 px-3 
              {{$mom->oid_high_issues === '-'? '':'d-none'}}">
            <i class="fa-solid fa-plus"></i> Lengkapi Detail
          </a>
          <a href="/editdetail/{{$mom->oid_mom}}" class="btn btn-outline-primary py-1 px-3 
              {{$mom->oid_high_issues === '-'? 'd-none':''}}">
            <i class="fa-solid fa-plus"></i> Edit Detail
          </a>
        </div>
      </div>
      <!-- end detail -->
    </div>
  </div>
</div>


{{-- footer gaess --}}
<div class="container-fluid mt--7">
  <div class="row mt-5" style="min-height: 200px">
  </div>
  <!-- Footer -->
  @include('layout.footer')
</div>
@endsection