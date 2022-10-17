@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Add Documentation MoM</h3>
            <a href="/mom" class="btn btn-secondary py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
        </div>
        <hr class="mt-4 mb-4 pb-4">
        <div class="row">
            <div class="col-md-6">
                <div style="overflow-x: auto">
                    <table style="width: 100%">
                        <tr>
                            <td class="p-2 m-0">
                                <h4>OID MOM</h4>
                            </td>
                            <td class="p-2">{{$mom->oid_mom}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>SBU Name</h4>
                            </td>
                            <td class="p-2">{{$mom->sbu_name}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>Type Of MoM</h4>
                            </td>
                            <td class="p-2">{{$mom->jenis_mom}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>Agenda</h4>
                            </td>
                            <td class="p-2">{{$mom->agenda}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>Place</h4>
                            </td>
                            <td class="p-2">{{$mom->tempat}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>Notulen</h4>
                            </td>
                            <td class="p-2">{{$mom->notulen}}</td>
                        </tr>
                        <tr>
                            <td class="p-2 m-0">
                                <h4>Attendees</h4>
                            </td>
                            <td class="p-2">{{$mom->attendees}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border p-3 rounded-3" style="border-radius: 6px">
                    <div class="mb-3">
                      <div>
                        <img id="preview-image" style="max-width: 100%">
                      </div>
                      <div class="text-center mt-2" id="file-name">
                        {{-- innrHTML --}}
                      </div>
                    </div>
                    <form action="/storedoc/{{$mom->oid_mom}}" method="post" enctype="multipart/form-data">
                        @method('Post')
                        @csrf
                        {{-- Dokumen --}}
                        <div class="form-group">
                            <label for="upload-dokumen">Document</label>
                            <input type="file" name="dokumen"
                                class="form-control @error('dokumen') is-invalid @enderror" id="upload-dokumen">
                            @error('dokumen')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success"> Add Document</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
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

@push('addon-script')
<script type="text/javascript">

  let upload = document.getElementById('upload-dokumen')
  let preview =  document.getElementById('preview-image')
  let fileName =  document.getElementById('file-name')
  
  upload.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(upload.files[0]);

    fileName.innerHTML = upload.files[0].name;
    reader.onload = ()=>{
      preview.setAttribute('src',reader.result);
    }

  }
</script>

@endpush
