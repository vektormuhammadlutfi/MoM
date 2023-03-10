@extends('layout.coreview')
@section('content')

<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-5 px-4" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div> 
    @endif
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Data Group</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/user/create" class="btn btn-success py-1"><i class="fa-solid fa-plus"></i> Add Group</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">User Group</th>
                  <th style="font-size: 13px">Menu Name</th>
                  <th style="font-size: 13px">Status Active</th>
                  <th style="font-size: 13px" class="width-max05">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $no = 0?>
            @foreach ($group as $item)
              <tr>
                <td>{{ ++$no }}</td>
                <td class="width-min07">{{ $item->usergroup }}</td>
                <td class="width-min07">{{ $item->menuname }}</td>
                <td class="width-max2">{{ $item->staktif }}</td>

                <td style="min-width: 125px">
                  {{-- <a  href="{{ url("/detailuser") }}" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a> --}}
                  <a href="#" class="btn btn-y btn-sm py-2" id="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                  <form action="{{ url("/user") }}" method="post" class="py-2 d-inline">
                    @method('delete')
                    @csrf
                    <button   onClick="return confirm('Are you sure want to delete this data ?')" class="btn btn-outline-danger btn-sm py-2"><i class="fa-solid fa-trash-can"></i></button>
                  </form>
                </td>                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')

@endsection