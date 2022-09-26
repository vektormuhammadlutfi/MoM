@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Edit MoM</h3>
      <a href="/branch" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
    </div>
    <hr class="mt-3 mb-4 pb-4">

    <!-- detail -->
    <div class="col-lg-12 mx-auto">
      <form action="/mom/{{$dataMomEdit->oid_mom}}" method="post">
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
          @error('jenis_mom')
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
          <label for="tempatMom">Tempat</label>
          <input type="text" value="{{ old('tempat', $dataMomEdit->tempat) }}" name="tempat" class="form-control @error('tempat') is-invalid @enderror" placeholder="masukkan Tempat" id="tempatMom">
          @error('tempat')
            <div class="invalid-feedback">{{ $message }} </div>        
          @enderror
        </div>    
        <div class="form-group">
          <label for="notulenMom">Notulen</label>
          <input type="text" value="{{ old('notulen', $dataMomEdit->notulen) }}" name="notulen" class="form-control @error('notulen') is-invalid @enderror" placeholder="masukkan Notulen" id="notulenMom">
          @error('notulen')
            <div class="invalid-feedback">{{ $message }} </div>        
          @enderror
        </div>    
        <div class="form-group">
          <label for="attendeesMom">Attendees</label>
          <input type="text" value="{{ old('attendees', $dataMomEdit->attendees) }}" name="attendees" class="form-control @error('attendees') is-invalid @enderror" placeholder="masukkan Attendees" id="attendeesMom">
          @error('attendees')
            <div class="invalid-feedback">{{ $message }} </div>        
          @enderror
        </div>    
        <div class="form-group">
          <label for="waktuMom">Waktu</label>
          <input type="date" value="{{ old('tgl_mom', $dataMomEdit->tgl_mom) }}" name="tgl_mom" class="form-control @error('tgl_mom') is-invalid @enderror" id="waktuMom">
          @error('tgl_mom')
            <div class="invalid-feedback">{{ $message }} </div>        
          @enderror
        </div>    
        {{-- <input hidden name="user" value="{{auth()->user()->name}}"> --}}
        <div class="d-flex flex-row-reverse">
          <button type="submit" class="btn btn-success" >Edit</button>
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
