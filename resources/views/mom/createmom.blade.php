@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Tambah Data MOM</h3>
        <a href="/mom" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="/mom" method="post">
          @method('post')
          @csrf
          <div class="form-group">
            <label for="SBU">SBU Name</label>
            <select class="form-control @error('oid_sbu') is-invalid @enderror" name="oid_sbu" id="SBU">
              @foreach ($dataSbu as $itemSbu)
                <option class="dropdown-item" value="{{ $itemSbu->oid_sbu }}">{{ $itemSbu->sbu_name }}</option>
              @endforeach
            </select>
            @error('oid_sbu')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="jenisMom">Jenis Mom</label>
            <select class="form-control @error('') is-invalid @enderror" name="oid_jen_mom" id="jenisMom">
              @foreach ($dataJenisMom as $itemJenisMom)
                <option class="dropdown-item" value="{{ $itemJenisMom->oid_jen_mom }}">{{ $itemJenisMom->jenis_mom }}</option>
              @endforeach
            </select>
            @error('oid_jen_mom')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          
          <div class="form-group">
            <label for="agendamom">Agenda</label>
            <input type="text" name="agenda" value="{{ old('agenda') }}" class="form-control @error('agenda') is-invalid @enderror" placeholder="Masukkan Agenda" id="agendamom">
            @error('agenda')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" name="tempat" value="{{ old('tempat') }}" class="form-control @error('tempat') is-invalid @enderror" placeholder="Masukkan Tempat" id="tempat">
            @error('tempat')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="notulen">Notulen</label>
            <input type="text" name="notulen" value="{{ old('notulen') }}" class="form-control @error('notulen') is-invalid @enderror" placeholder="Masukkan Notulen" id="notulen">
            @error('notulen')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="attendees">Attendees</label>
            <input type="text" name="attendees" value="{{ old('attendees') }}" class="form-control @error('attendees') is-invalid @enderror" placeholder="Masukkan Attendees" id="attendees">
            @error('attendees')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="emailbranch">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror"  id="tanggal">
            @error('tanggal')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-success" >Create</button>
          </div>
        </form>
      </div>
      <!-- end detail -->

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
