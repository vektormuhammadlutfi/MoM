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
    <div class="card-body py-4" >
      <div class="row d-flex justify-content-center">
        
        <div class="col-lg-10">
          <h2 class="fw-bold mb-4 text-center">Register now</h2>
          <form action="/register" method="post">
            @csrf
            <div class="form-outline mb-3">
              <label for="form3Example3">Username</label>
              <input type="text" name="name" value="{{ old('name') }}" id="form3Example3" class="form-control @error('name') is-invalid @enderror" required/>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3">
              <label for="first_name">First Name</label>
              <input type="text" name="firs_name" value="{{ old('firs_name') }}" id="first_name" class="form-control @error('firs_name') is-invalid @enderror" required/>
              @error('firs_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3"> 
              <label class="text-align-left" for="folastname">Last Name</label>
              <input type="text" name="last_name" value="{{ old('last_name') }}" id="folastname" class="form-control @error('last_name') is-invalid @enderror" required/>
              @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3">
              <label for="email">Email address</label>
              <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control  @error('email') is-invalid @enderror" required/>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3">
              <label for="hp">HP</label>
              <input type="number" name="hp" value="{{ old('hp') }}" id="hp" class="form-control  @error('hp') is-invalid @enderror" required/>
              @error('hp')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="pass">Password</label>
              <input type="password" name="password" value="{{ old('password') }}" id="pass" class="form-control  @error('password') is-invalid @enderror" required/>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            {{-- <div class="form-outline mb-3">
              <label class="form-label" for="conpass">Confirm Password</label>
              <input type="password" id="conpass" class="form-control" />
            </div> --}}

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">
              Sign up
            </button>
            <small class="d-block text-center mt-3" style="font-size: 15px">Already have an account? <a href="/login">Login Now!</a></small>
          </form>
        </div>
      </div>
    </div>
  </div>


  @include('layout.script')
</body>
</html>