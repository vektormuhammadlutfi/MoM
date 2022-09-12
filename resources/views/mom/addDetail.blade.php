@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Detai MOM</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')



{{-- content utama dibawah ini yaa --}}
<div class="card" style="
  margin: -150px auto 90px auto;
  backdrop-filter: blur(30px);
  max-width: 800px;
  width: 95%">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #181bb3"></i> Tambah Detail MOM</h3>
        <a href="/mom" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="{{url("/storedetail/{$mom->oid_mom}")}}" method="post">
          @method('Post')
          @csrf
          <div class="form-group">
            <label for="tanggalmulai">Tanggal Mulai</label>
            <input type="date" name="tanggalmulai" class="form-control @error('tanggalmulai') is-invalid @enderror"  id="tanggalmulai">
            @error('tanggalmulai')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="highlight_issues">Highlight Issues</label>
            <input type="text" name="highlight_issues" class="form-control @error('highlight_issues') is-invalid @enderror" placeholder="Input Highlight Issues" id="highlight_issues">
            @error('highlight_issues')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="due_date_info">Due Date Info</label>
            <input type="text" name="due_date_info" class="form-control @error('due_date_info') is-invalid @enderror" placeholder="Input Due Date Info" id="due_date_info">
            @error('due_date_info')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="pic">PIC</label>
            <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" placeholder="Input PIC" id="pic">
            @error('pic')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="informasi">Informasi</label>
            <input type="text" name="informasi" class="form-control @error('informasi') is-invalid @enderror" placeholder="Input Informasi" id="informasi">
            @error('informasi')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="dokumen">Dokumen</label>
            <input type="file" name="dokumen" class="form-control @error('dokumen') is-invalid @enderror" placeholder="Input Dokumen" id="dokumen">
            @error('dokumen')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn py-1 btn-info" >Tambah Detail</button>
          </div>
        </form>
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
