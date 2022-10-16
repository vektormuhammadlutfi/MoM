@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div class="card" style="
  margin: -150px auto 90px auto;
  backdrop-filter: blur(30px);
  max-width: 800px;
  width: 95%">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Edit MoM Detail</h3>
        <a href="/momdetail" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="/momdetail/{{$detail->oid_high_issues}}" method="post">
          @method('put')
          @csrf
          {{-- Hightligth Issues --}}
          <div class="form-group">
            <label for="high_issues">Highlight Issues</label>
            <input type="text" name="highlight_issues" class="form-control" value="{{$detail->highlight_issues}}" id="high_issues" aria-describedby="emailHelp">
          </div>
          {{-- Due Date Info --}}
          <div class="form-group">
            <label for="ddi">Due Date Info</label>
            <input type="text" name="due_date_info" class="form-control" value="{{$detail->due_date_info}}" placeholder="Masukkan nama sbu" id="ddi" aria-describedby="emailHelp">
          </div>
          {{-- PIC --}}
          <div class="form-group">
            <label for="pic">PIC</label>
            <input type="text" name="pic" class="form-control" value="{{$detail->pic}}" placeholder="Masukkan nama sbu" id="pic" aria-describedby="emailHelp">
          </div>
          {{-- Informasi --}}
          <div class="form-group">
            <label for="info">Information</label>
            <input type="text" name="informasi" class="form-control" 
            value="{{ old('informasi', $detail->informasi) }}" id="info" aria-describedby="emailHelp">
            @error('informasi')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          {{-- Proses Minggu Lalu --}}
          <div class="form-group">
            <label for="progres_minggu_lalu">Last Week's Progress</label>
            <input type="text" value="{{ old('progres_minggu_lalu', $detail->progres_minggu_lalu) }}" name="progres_minggu_lalu" class="form-control @error('progres_minggu_lalu') is-invalid @enderror" id="proses_minggu_lalu">
            @error('progres_minggu_lalu')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          {{-- Rencana Minggu Ini --}}
          <div class="form-group">
            <label for="rencana_minggu_ini">This Week's Plans</label>
            <input type="text" value="{{ old('rencana_minggu_ini', $detail->rencana_minggu_ini) }}" 
                  name="rencana_minggu_ini" class="form-control @error('rencana_minggu_ini') is-invalid @enderror" 
                  id="rencana_minggu_ini"
            >
            @error('rencana_minggu_ini')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          {{-- Status Issue --}}
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control @error('sts_issue') is-invalid @enderror" name="sts_issue" id="status">
              @foreach ($sts_input as $item)
                <option class="dropdown-item" {{ ($detail->sts_issue == $item)?'selected':''}}>{{ $item }}</option>
              @endforeach
            </select>
            @error('sts_issue')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          {{-- Keterangan --}}
          <div class="form-group">
            <label for="ket">Description</label>
            <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" placeholder="Type '-' if there is no description" rows="3"></input>
            {{-- <input type="text" value="{{ old('ket', $detail->ket) }}" 
                  name="ket" class="form-control @error('ket') is-invalid @enderror" 
                  id="ket"
            > --}}
            @error('rencana_minggu_ini')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="d-flex flex-row-reverse">
            {{-- onclick="return confirm(', Yakin Ingin Edit ?')" --}}
            <button type="submit" class="btn btn-warning">Edit</button>
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
