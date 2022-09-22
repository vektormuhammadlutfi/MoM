@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Mom Detail | Edit</a>
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
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Edit Mom Detail</h3>
        <a href="/momdetail" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form action="/momdetail/{{$detail->oid_high_issues}}" method="post">
          @method('put')
          @csrf
          <div class="form-group">
            <label for="high_issues">Highlight Issues</label>
            <input type="text" name="highlight_issues" class="form-control" value="{{$detail->highlight_issues}}" id="high_issues" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="ddi">Due Date Info</label>
            <input type="text" name="due_date_info" class="form-control" value="{{$detail->due_date_info}}" placeholder="Masukkan nama sbu" id="ddi" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="pic">PIC</label>
            <input type="text" name="pic" class="form-control" value="{{$detail->pic}}" placeholder="Masukkan nama sbu" id="pic" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="info">Informasi</label>
            <input type="text" name="informasi" class="form-control" value="{{$detail->informasi}}" placeholder="Masukkan nama sbu" id="info" aria-describedby="emailHelp">
          </div>
          <div class="d-flex flex-row-reverse">
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
