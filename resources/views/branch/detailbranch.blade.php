@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-auto mt--150" style="max-width: 900px; width:95%">
    <div class="card-body">
        
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Branch Detail</h3>
        <a href="/branch" class="btn btn-secondary py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="row">
              <h4 class="col-lg-4">Oid Branch</h4>
              <p class="col-lg-8">{{$DataBranch->oid_branch}}</p>
            </div>
          </div>

          <div class="col-md-7">
            <div class="row">
              <h4 class="col-lg-4">Branch Name</h4>
              <p class="col-lg-8">{{$DataBranch->branch_name}}</p>
            </div>
          </div> 
        </div>
        <hr class="mt-0">

        <div class="container mt-5">
          <div class="row">
            <h4 class="col-md-5">Holding</h4>
            <p class="col-md-7">{{$DataBranch->holding}} </p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">Sub Holding</h4>
            <p class="col-md-7">{{$DataBranch->subholding}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">SBU</h4>
            <p class="col-md-7">{{$DataBranch->sbu_name}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">Address</h4>
            <p class="col-md-7">{{$DataBranch->address}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">Email</h4>
            <p class="col-md-7">{{$DataBranch->email}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">Phone Number</h4>
            <p class="col-md-7">{{$DataBranch->phone}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col-md-5">Description</h4>
            <p class="col-md-7">{{$DataBranch->ket}}</p>
          </div>
        </div>
        <hr class="mt-0">
      </div>
      <!-- end detail -->
    </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')
@endsection
