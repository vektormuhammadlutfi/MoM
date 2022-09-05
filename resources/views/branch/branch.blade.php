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
<div class="card shadow-lg bg-body" style="
  margin: -150px auto 90px auto;
  background: hsla(0, 0%, 100%, 0.8);
  backdrop-filter: blur(30px);
  width: 95%
  ">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Data Branch</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/createbranch" class="btn btn-info py-1"><i class="fa-solid fa-plus"></i> Data Baru</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">Oid Branch</th>
                  <th style="font-size: 13px">Branch Name</th>
                  <th style="font-size: 13px">Address</th>
                  <th style="font-size: 13px">Phone</th>
                  <th style="font-size: 13px">Action</th>
              </tr>
          </thead>
          <tbody>

              @foreach ($Branches as $branch)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $branch->oid_branch}}</td>
                  <td>{{ $branch->branch_name}}</td>
                  <td>{{ $branch->address}}</td>
                  <td>{{ $branch->phone}}</td>

                  <td>
                    <a  href="{{url("/detailbranch/{$branch->id}")}}" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>

                    <a href="/editbranch" class="btn btn-success btn-sm py-2"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a  href="/sbu" class="btn btn-danger btn-sm py-2"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
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
