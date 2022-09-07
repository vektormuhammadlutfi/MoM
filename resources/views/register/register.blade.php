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
              <label for="form3Example3">First Name</label>
              <input type="text" name="firstname"  id="form3Example3" class="form-control" />
            </div>
            <div class="form-outline mb-3"> 
              <label class="text-align-left" for="folastname">Last Name</label>
              <input type="text" name="lastname" id="folastname" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label for="email">Email address</label>
              <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label for="hp">HP</label>
              <input type="text" name="hp" id="hp" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="pass">Password</label>
              <input type="password" name="password" id="pass" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="conpass">Confirm Password</label>
              <input type="password" id="conpass" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">
              Sign up
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>


  @include('layout.script')
</body>
</html>