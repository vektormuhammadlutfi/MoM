@extends('layout.coreview')

@section('content')
 {{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card border-0 shadow bg-secondary">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> MOM  Description</h3>
        <!-- <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button> -->
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 300px">
          <thead >
              <tr>
                  <th class="text-center" style="font-size: 13px;width:50px;">No</th>
                  <th style="font-size: 13px">OID MOM</th>
                  <th style="font-size: 13px">DOCUMENT</th>
              </tr>
          </thead>
          <tbody>
            @foreach($description as $description)
                <tr>
                  <td class="text-center" style="width: 50px">{{$loop->iteration}}</td>
                  <td>{{$description->oid_mom}}</td>
                  <td>
                    <a target='_blank' href="storage\{{$description->gambar}}">{{$description->dokumen}}</a>
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



















