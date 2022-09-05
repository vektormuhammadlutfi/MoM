<div class="card shadow-lg bg-body" style="
  margin: -150px auto 90px auto;
  background: hsla(0, 0%, 100%, 0.8);
  backdrop-filter: blur(30px);
  /* max-width: 1000px; */
  width: 95%">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Detail Branch</h3>
        <a href="/branch" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Kembali</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="container ">
            <div class="row">
              <h4 class="col-4">Id Branch</h4>
              <p class="col-8">{{$Branch->id}} </p>
            </div>
            <hr class="mt-0">
          </div>
          <div class="container ">
            <div class="row">
              <h4 class="col-4">Branch Name</h4>
              <p class="col-8">{{$Branch->branch_name}}</p>
            </div>
            <hr class="mt-0">
          </div>
        </div>

        <div class="container mt-0">
          <div class="row">
            <h4 class="col">Holding</h4>
            <p class="col">{{$Branch->holding}}</p>
          </div>
        </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Sub Holding</h4>
            <p class="col">{{$Branch->subholding}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Sbu</h4>
            <p class="col">{{$Branch->sbu_name}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Address</h4>
            <p class="col">{{$Branch->address}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Email</h4>
            <p class="col">{{$Branch->email}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Phone</h4>
            <p class="col">{{$Branch->phone}}</p>
          </div>
        </div>
        <hr class="mt-0">
        <div class="container ">
          <div class="row">
            <h4 class="col">Description</h4>
            <p class="col">{{$Branch->ket}}</p>
          </div>
        </div>
      </div>


      </div>
  <!-- end detail -->

    </div>
  </div>
</div>
