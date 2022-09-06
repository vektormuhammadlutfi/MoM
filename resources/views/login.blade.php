<!DOCTYPE html>
<html lang="en">
  @include('layout.head')
  @include('navbar.navbg')




  {{-- content utama dibawah ini yaa --}}
  <div class="card shadow-lg bg-body" style="
        margin: -150px auto 100px auto;
        backdrop-filter: blur(30px);
        max-width: 600px;
        width: 95%
        ">
    <div class="card-body py-4" >
      <div class="row d-flex justify-content-center">
        
        <div class="col-lg-10">
          <h2 class="fw-bold mb-5 mt-3 text-center">Login</h2>
          <form action="/login" method="post">
            @csrf
            <div class="form-outline mb-3">
              <label for="form3Example3">Email address</label>
              <input type="email" name="email" id="form3Example3" class="form-control" autofocus required/>
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control" autofocus required/>
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


  {{-- footer gaess --}}
  {{-- <div class="container-fluid mt--7">
    <div class="row mt-5" style="min-height: 200px">
    </div>
    @include('layout.footer')
  </div> --}}
  @include('layout.script')
</body>
</html>