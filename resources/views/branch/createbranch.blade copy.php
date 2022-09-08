@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Branch</a>
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
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #181bb3"></i> Tambah Data Branch</h3>
        <a href="/branch" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form method="post" action="{{route('createbranch')}}">
        @method('POST')
        @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Holding</label>
            <input type="text" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp" disable value="{{ $holding->holding }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Sub Holding</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($SubHolding as $item)
                    <option class="dropdown-item" value="{{$item->oid_subholding}}">{{$item->subholding}}</option>
                @endforeach
              <!-- <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option> -->
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">SBU</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach( $Sbu as $itemsbu)
                    <option class="dropdown-item" value="{{ $itemsbu->oid_sbu }}" selected>{{ $itemsbu->sbu_name}}</option>
                 @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Branch Name</label>
            <input name='branch name' type="text" 
             class="form-control @error('branch_name') is-invalid @enderror" placeholder="Input Branch Name" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value="{{ old('branch_name')}}">
             @error
             <div class="invalid-feedback">
              {{ $massage }}
             </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Input Address" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value="{{ old('address')}}">
            @error(address)
             <div class="invalid-feedback">
              {{ $massage }}
             </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name='email' type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Input Email" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value={{ old('email')}}>
            @error(email)
             <div class="invalid-feedback">
              {{ $massage }}
             </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input name='phone' type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Input Phone Number" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value={{ old('phone')}}>
            @error(phone)
             <div class="invalid-feedback">
              {{ $massage }}
             </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input name='description' type="text" class=" form-control @error ('address') is-invalid @enderror " placeholder="Input Description" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value={{ old('ket')}}>
            @error(ket)
             <div class="invalid-feedback">
              {{ $massage }}
             </div>
             @enderror
          </div>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn py-1 btn-primary" >Create</button>
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
