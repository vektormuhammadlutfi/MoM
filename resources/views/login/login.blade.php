<!DOCTYPE html>
<html lang="en">
  @include('layout.head')
  @include('navbar.navbg')




  {{-- content utama dibawah ini yaa --}}
  <div class="card shadow-lg bg-body" style="
        margin: -200px auto 100px auto;
        backdrop-filter: blur(30px);
        max-width: 600px;
        width: 95%
        ">
    <div class="card-body py-4">
      <div class="row d-flex justify-content-center">
        
        {{-- @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>            
        @endif --}}
        <div class="col-lg-10">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
          @endif
          @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
          @endif

          <h2 class="fw-bold my-4 text-center">Login</h2>
          <form action="/login" method="post">
            @csrf
            <div class="form-outline mb-3">
              <label for="form3Example3">Email address</label>
              <input type="email" name="email" id="form3Example3" class="form-control @error('email') is-invalid @enderror" autofocus required value="{{ old('email') }}"/>
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control @error('password') is-invalid @enderror" autofocus required/>
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">
              Sign up
            </button>
          </form>
          <small class="d-block text-center mt-3" style="font-size: 15px">Not Registered? <a href="/register">Register Now!</a></small>
        </div>
      </div>
    </div>
  </div>


  {{-- footer gaess --}}
  {{-- <div class="container-fluid mt--7">
    <div class="row mt-5" style="min-height: 200px">
    </div>
    @include('layout.footer')
  </div> --}}
  @include('layout.script')
</body>
</html>