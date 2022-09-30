@extends('layout.coreview')
@section('content')

<!-- Page content -->
<div class="container-fluid mb-5 mt--67">
  <div class="row profile">
    {{-- Left Content --}}
    <div class="col-xl-8 order-lg-1 order-2">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <h3 class="mb-0">My account</h3>
        </div>
        <div class="card-body">
          @if (session()->has('success'))
            <div class="alert alert-success bg-success alert-dismissible fade show mb-5 px-4" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div> 
          @endif

          <h6 class="heading-small text-muted mb-4">User information</h6>
          <div class="pl-lg-4">
            <form action="/editprofile/{{ auth()->user()->oid_user }}" method="post" >
              @method('put')
              @csrf
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Username</label>
                  <input disabled type="text" name="username" id="input-username" class="font-16 form-control form-control-alternative @error('username') is-invalid @enderror" value="{{ auth()->user()->username }}">
                  @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">First name</label>
                  <input type="text" name="firs_name" id="input-first-name" class="font-16 form-control form-control-alternative @error('firs_name') is-invalid @enderror" value="{{ auth()->user()->firs_name }}">
                  @error('firs_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Last name</label>
                  <input type="text" name="last_name" id="input-last-name" class="font-16 form-control form-control-alternative @error('last_name') is-invalid @enderror" value="{{ auth()->user()->last_name }}">
                  @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Email address</label>
                  <input type="email" name="email" id="input-email" class="font-16 form-control form-control-alternative @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}">
                  @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-phone">Nomor Telpon</label>
                  <input type="number" name="telp" id="input-phone" class="font-16 form-control form-control-alternative @error('telp') is-invalid @enderror" value="{{ auth()->user()->telp }}">
                  @error('telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">User Group</label>
                  <input type="text" name="usergroup" id="input-last-name" class="font-16 form-control form-control-alternative" value="{{ auth()->user()->usergroup }}" disabled>
                </div>
                <button type="submit" class="btn btn-success py-2">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- End Left Content --}}

    {{-- Right Content --}}
    <div class="col-xl-4 order-lg-2 order-1 mb-5 mb-xl-0">
      <div class="card shadow p-4 right-content">
        {{-- Photo Profile --}}
        <div class="photo-profile text-center mt--7 ">
              @if (auth()->user()->profile_photo_path)
                <button class="btn rounded-circle photo-profile change-profile" data-toggle="modal" data-target="#exampleModal"
                  style="width:200px;height:200px;
                  
                  background-image: url('{{ asset('storage/'.auth()->user()->profile_photo_path) }}')">
                </button>
              @else
              <button title="edit photo" class="btn rounded-circle photo-profile change-profile" data-toggle="modal" data-target="#exampleModal"
                  style="width:200px;height:200px;
                  background-image: url('../assets/img/default_profil.png')">
                </button>
              @endif
        </div>
        {{-- End Photo Profile --}}
        <div class="mt-4">
            @if (session()->has('success_pass'))
              <div class="alert alert-success bg-success alert-dismissible fade show mb-5 px-4" role="alert">
              {{ session('success_pass') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div> 
            @endif
            {{-- Nama --}}
            <h3>
              @if (auth()->user()->first_name !== null && auth()->user()->last_name !== null)
                {{ auth()->user()->first_name  }} {{ auth()->user()->last_name  }} 
              @else
                {{ auth()->user()->username  }} 
              @endif
            </h3> 

            {{-- Role --}}
            <hr class="my-4" />
            <div class="form-group">
              <h5 class="heading-small text-muted mb-3">Role</h5>
              <input type="text" id="input-last-name" class="font-16 form-control bg-secondary form-control-alternative" placeholder="Admin" value="{{ auth()->user()->usergroup }}" disabled style="padding: 10px; width: 100%;">
            </div> 
            <hr class="my-4" />

            {{-- Form Change Password --}}
            <form class="text-left" action="/changepassword" method="post">
              @csrf
              @method('put')
              <h5 class="heading-small text-muted mb-3">Ganti Kata Sandi</h5>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend bg-secondary">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password" name="password" value="{{ old('password') }}" id="pass" class="form-control bg-secondary px-2 @error('password') is-invalid @enderror" placeholder="Password" required/>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control bg-secondary px-2 @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" required/>
                  @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-success py-2">Save</button>
            </form>
            
          </div>
        </div>
    </div>
    {{-- End Right Content --}}
  </div>
</div>


<!-- Modal Edit Photo Profile-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Edit Photo Profile</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form action="/changeprofile" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  @csrf
                  @method('put')
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Select Photo</label>
                    <input type="file" name="profile_photo_path" class="form-control form-control-file @error('profile_photo_path') is-invalid @enderror" id="exampleFormControlFile1">
                    @error('profile_photo_path')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>

            </div>
          </div>
        </div>
@endsection