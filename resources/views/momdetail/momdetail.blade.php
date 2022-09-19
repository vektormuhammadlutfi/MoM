@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Mom Detail</a>
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
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Mom Detail</h3>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th class="text-center" style="font-size: 13px">No</th>
                  <th class="text-center" style="font-size: 13px">OID</th>
                  {{-- <th style="font-size: 13px">OID MOM</th> --}}
                  <th class="text-center" style="font-size: 13px">Highlight Issues</th>
                  <th class="text-center" style="font-size: 13px">Due Date Info</th>
                  <th class="text-center" style="font-size: 13px">PIC</th>
                  <th class="text-center" style="font-size: 13px">Informasi</th>
                  <th class="text-center" style="font-size: 13px">ACtion</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($details as $detail)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td class="width-min07">{{$detail->oid_high_issues}}</td>
                      {{-- <td>{{$detail->oid_mom}}</td> --}}
                      <td>{{$detail->highlight_issues}}</td>
                      <td>{{$detail->due_date_info}}</td>
                      <td>{{$detail->pic}}</td>
                      <td>{{$detail->informasi}}</td>
                      <td style="max-width: 30px;" class="px-0 text-center">
                    <div class="dropdown" style="background-color: transparent">
                      <a  class="btn px-3 action-table" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <iconify-icon icon="akar-icons:more-horizontal"></iconify-icon>
                      </a>
                      <div class="dropdown-menu px-3" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-item">
                          <a href="{{url("/momdetail/{$detail->oid_high_issues}")}}" class="text-decoration-none text-yellow">
                            <i class="fa-solid fa-pen-to-square"></i> Edit 
                          </a>
                        </div>
                        <div class="dropdown-item">
                          <form action="{{url("/momdetail/{$detail->oid_high_issues}")}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit"  class="c-btn text-decoration-none text-danger" 
                            onClick="return confirm('Yakin Ingin Menghapus MoM ?')">
                              <i class="fa-solid fa-trash-can"></i> Hapus
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                  </tr>
              @endforeach
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
