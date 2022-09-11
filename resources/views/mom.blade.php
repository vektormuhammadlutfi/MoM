@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Mom</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')




{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body" style="
  margin: -150px auto 90px auto;
  background: hsla(0, 0%, 100%, 0.8);
  backdrop-filter: blur(30px);
  width: 95%
  ">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i>Mom</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/createmomdetail" class="btn btn-info py-1"><i class="fa-solid fa-plus"></i> Data Baru</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">Action</th>
                  <th style="font-size: 13px">OID</th>
                  <th style="font-size: 13px">Nama SBU</th>
                  <th style="font-size: 13px">Jenis MOM</th>
                  <th style="font-size: 13px">Agenda</th>
                  <th style="font-size: 13px">Waktu</th>
                  <th style="font-size: 13px">Status</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($moms as $mom)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td style="max-width: 30px;" class="px-0 text-center">
                    <div class="dropdown" style="background-color: transparent">
                      <a  class="btn px-3 action-table" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <iconify-icon icon="akar-icons:more-horizontal"></iconify-icon>
                      </a>
                      <div class="dropdown-menu px-3" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-item">
                          <a  href="/moremomdetail" class="text-decoration-none" >
                            <i class="fa-regular fa-eye"></i> Detail 
                          </a>
                        </div>
                        {{-- <hr style="margin: 8px 0"> --}}
                        <div class="dropdown-item">
                          <a href="/editmomdetail" class="text-decoration-none text-success">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                          </a>
                        </div>
                        {{-- <hr style="margin: 8px 0"> --}}
                        <div class="dropdown-item">
                          <a  href="/sbu" class="text-decoration-none text-danger">
                            <i class="fa-solid fa-trash-can"></i> Hapus
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="width-min07">{{$mom->oid_mom}}</td>
                  <td>{{$mom->sbu_name}}</td>
                  <td>{{$mom->jenis_mom}}</td>
                  <td>{{$mom->agenda}}</td>
                  <td>{{$mom->hari}},{{$mom->tgl_mom}}</td>
                  <td>(ini Status)</td>
                  {{-- <td>{{$mom->sts_issue}}</td> --}}
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
