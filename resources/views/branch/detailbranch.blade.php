@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card-body">
        
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Detail Branch</h3>
        <a href="/branch" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="d-flex justify-content-between">

          <div class="container ">
            <div class="row">
              <h4 class="col-4">Oid Branch</h4>
              <p class="col-8">{{$DataBranch->oid_branch}}</p>
            </div>
            <hr class="mt-0">
          </div>

          <div class="container ">
            <div class="row">
              <h4 class="col-4">Branch Name</h4>
              <p class="col-8">{{$DataBranch->branch_name}}</p>
            </div>
            <hr class="mt-0">
          </div> 
        </div>

        <div class="container mt-5">
          <div class="row">
            <h4 class="col">Holding</h4>
            <p class="col">{{$DataBranch->holding}} </p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Sub Holding</h4>
            <p class="col">{{$DataBranch->subholding}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">SBU</h4>
            <p class="col">{{$DataBranch->sbu_name}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Address</h4>
            <p class="col">{{$DataBranch->address}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Email</h4>
            <p class="col">{{$DataBranch->email}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Phone Number</h4>
            <p class="col">{{$DataBranch->phone}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Description</h4>
            <p class="col">{{$DataBranch->ket}}</p>
          </div>
        </div>
        <hr class="mt-0">
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
