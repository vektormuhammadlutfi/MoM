@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/mom">MOM | Detail MOM</a>
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
        <a href="/mom" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">
      <div class="row">
        <div class="col-md-5">
          <div style="overflow-x: auto">
            <table style="width: 100%">
              <tr>
                <td class="p-2 m-0"><h4>OID MOM</h4></td>
                <td class="p-2">{{$mom->oid_mom}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>SBU Name</h4></td>
                <td class="p-2">{{$mom->sbu_name}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>Jenis MOM</h4></td>
                <td class="p-2">{{$mom->jenis_mom}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>Agenda</h4></td>
                <td class="p-2">{{$mom->agenda}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>Tempat</h4></td>
                <td class="p-2">{{$mom->tempat}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>Notulen</h4></td>
                <td class="p-2">{{$mom->notulen}}</td>
              </tr>
              <tr>
                <td class="p-2 m-0"><h4>Attendees</h4></td>
                <td class="p-2">{{$mom->attendees}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-7">
          <div class="border p-3 rounded-3" style="border-radius: 6px">
            <form action="{{url("/storedetail/{$mom->oid_mom}")}}" method="post" enctype="multipart/form-data">
              @method('Post')
              @csrf
              {{-- Tanggal Mulai --}}
              {{-- <div class="form-group">
                <label for="tanggalmulai">Tanggal Mulai</label>
                <input type="date" name="tanggalmulai" class="form-control @error('tanggalmulai') is-invalid @enderror"  id="tanggalmulai">
                @error('tanggalmulai')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div> --}}
              {{-- Highlight Issues --}}
              <div class="form-group">
                <label for="highlight_issues">Highlight Issues</label>
                <input type="text" name="highlight_issues" class="form-control @error('highlight_issues') is-invalid @enderror" placeholder="Input Highlight Issues" id="highlight_issues">
                @error('highlight_issues')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div>
              {{-- Due Date Info --}}
              <div class="form-group">
                <label for="due_date_info">Due Date Info</label>
                <input type="text" name="due_date_info" class="form-control @error('due_date_info') is-invalid @enderror" placeholder="Input Due Date Info" id="due_date_info">
                @error('due_date_info')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div>
              {{-- PIC --}}
              <div class="form-group">
                <label for="pic">PIC</label>
                <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" placeholder="Input PIC" id="pic">
                @error('pic')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div>
              {{-- Informasi --}}
              <div class="form-group">
                <label for="informasi">Informasi</label>
                <input type="text" name="informasi" class="form-control @error('informasi') is-invalid @enderror" placeholder="Input Informasi" id="informasi">
                @error('informasi')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div>
              {{-- Dokumen --}}
              <div class="form-group">
                <label for="dokumen">Dokumen</label>
                <input type="file" name="dokumen"  class="form-control @error('dokumen') is-invalid @enderror" placeholder="Input Dokumen" id="dokumen">
                @error('dokumen')
                  <div class="invalid-feedback">{{ $message }} </div>        
                @enderror
              </div>
              <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-success">Tambah Detail</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <hr>
      {{-- Table Detail --}}
      <h3 class="mb-5" >Table Detail MOM</h3>
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">OID</th>
                  <th style="font-size: 13px">Highlight Issues</th>
                  <th style="font-size: 13px">Due Date Info</th>
                  {{-- <th style="font-size: 13px">Issue User</th> --}}
                  <th style="font-size: 13px">PIC</th>
                  <th style="font-size: 13px">Informasi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($detailMom as $item)
                 <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->oid_high_issues}}</td>
                    <td>{{$item->highlight_issues}}</td>
                    <td>{{$item->due_date_info}}</td>
                    <td>{{$item->pic}}</td>
                    <td>{{$item->informasi}}</td>
                </tr> 
              @endforeach
              
              {{-- hh --}}
          </tbody>
        </table>
      </div>
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