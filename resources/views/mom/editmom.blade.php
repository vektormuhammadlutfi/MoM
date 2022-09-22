@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">MoM | Edit MoM</a>
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
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Edit MoM</h3>
        <a href="/branch" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="{{ url('/updatemom',$dataMomEdit->oid_mom) }}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="SBU">SBU Name</label>
            <select class="form-control @error('sbu_name') is-invalid @enderror" name="oid_sbu" id="SBU">
              @foreach ($sbuData as $item)
                <option class="dropdown-item" value="{{ $item->oid_sbu }}" {{ ($item->oid_sbu == $dataMomEdit->oid_sbu)?'selected':'' }}>{{ $item->sbu_name }}</option>
              @endforeach
            </select>
            @error('sbu_name')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="jenisMom">Jenis MoM</label>
            <select class="form-control @error('jenis_mom') is-invalid @enderror" name="oid_jen_mom" id="jenisMom">
              @foreach ($jenisMom as $itemJM)
                <option class="dropdown-item" value="{{ $itemJM->oid_jen_mom }}" {{ ($itemJM->oid_jen_mom == $dataMomEdit->oid_jen_mom)?'selected':'' }}>{{ $itemJM->jenis_mom }}</option>
              @endforeach
            </select>
            @error('sbu_name')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="agendaMom">Agenda</label>
            <input type="text" value="{{ old('agenda', $dataMomEdit->agenda) }}" name="agenda" class="form-control @error('agenda') is-invalid @enderror" placeholder="masukkan agenda" id="agendaMom">
            @error('agenda')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>    
          <div class="form-group">
            <label for="waktuMom">Waktu</label>
            <input type="date" value="{{ old('tgl_mom', $dataMomEdit->tgl_mom) }}" name="tgl_mom" class="form-control @error('waktu') is-invalid @enderror" id="waktuMom">
            @error('waktu')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>    
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn py-1 btn-success" >Edit</button>
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