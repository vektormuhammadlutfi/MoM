@extends('layout.coreview')

@section('content')

{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-auto mt--150" style="max-width: 900px; width:95%">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Create Branch Data</h3>
        <a href="/branch" class="btn btn-secondary py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="/branch" method="post">
          @csrf
          <div class="form-group">
            <label for="SBU">SBU Name</label>
            <select class="form-control @error('sbu_name') is-invalid @enderror" name="sbu_name" id="SBU">
              @foreach ($dataSbu as $item)
                <option class="dropdown-item" value="{{ $item->oid_sbu }}">{{ $item->sbu_name }}</option>
              @endforeach
            </select>
            @error('sbu_name')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="branchname">Branch Name</label>
            <input type="text" value="{{ old('branch_name') }}" name="branch_name" class="form-control @error('branch_name') is-invalid @enderror" placeholder="Input Branch Name" id="branchname">
            @error('branch_name')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="addressbranch">Address</label>
            <input type="text" value="{{ old('address') }}" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Input Address" id="addressbranch">
            @error('address')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="emailbranch">Email</label>
            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Input Email" id="emailbranch" aria-describedby="emailHelp">
            @error('email')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="hp">Phone Number</label>
            <input type="text" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Input Phone Number" id="hp">
            @error('phone')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" value="{{ old('ket') }}" name="ket" class="form-control @error('ket') is-invalid @enderror" placeholder="Input Description" id="desc">
            @error('ket')
              <div class="invalid-feedback">{{ $message }} </div>        
            @enderror
          </div>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-success py-1" >Create</button>
          </div>
        </form>
      </div>
      <!-- end detail -->

    </div>
  </div>
{{-- footer gaess --}}
@include('layout.footer')
@endsection
