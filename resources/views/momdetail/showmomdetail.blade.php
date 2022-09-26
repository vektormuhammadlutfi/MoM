@extends('layout.coreview')

@section('content')
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
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Mom Detail</h3>
        <a href="/momdetail" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> back</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="container ">
            <div class="row">
              <h4 class="col-4">OID MOM Detail</h4>
              <p class="col-8">{{$momdetail->oid_high_issues}}</p>
            </div>
            <hr class="mt-0">
          </div>
          <div class="container ">
            <div class="row">
              <h4 class="col-4">OID MOM</h4>
              <p class="col-8">{{$momdetail->oid_mom}}</p>
            </div>
            <hr class="mt-0">
          </div>
          
        </div>

        <div class="container mt-5">
          <div class="row">
            <h4 class="col">Highlight Issues</h4>
            <p class="col">{{$momdetail->highlight_issues}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Due Date Info</h4>
            <p class="col">{{$momdetail->due_date_info}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">PIC</h4>
            <p class="col">{{$momdetail->pic}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Informasi</h4>
            <p class="col">{{$momdetail->informasi}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Status Issue</h4>
            <p class="col">{{$momdetail->sts_issue}}</p>
          </div>
        </div>
        <hr class="mt-0">
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
