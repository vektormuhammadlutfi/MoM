@extends('coreview')

@section('content')
<div class="main-content">
  {{-- @include('nav') --}}

  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">SBU</a>
      <!-- Form -->
      {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
      </form> --}}
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold">Admin</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  {{-- end nav --}}
  <div class="header bg-gradient-success pb-8 pt-5 pt-md-8" ></div>
  <div class="card shadow-lg bg-body" style="
    margin: -150px auto 90px auto;
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    width: 95%
    ">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2 class="mb-0"><i class="fa-solid fa-list text-primary"></i> Data SBU</h2>
          <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div>
        <hr class="mt-2 mb-4">
        {{-- <h2 class="mb-0"><i class="fa-solid fa-list text-primary"></i> Data SBU</h2>
        <hr class="my-2"> --}}
        {{-- create and modal --}}
        {{-- <div class="d-flex flex-row-reverse">
          <button class="btn btn-info mb-2 py-2" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div> --}}
        <div class="table-responsive">
          <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
            <thead >
                <tr>
                    <th style="font-size: 13px">No</th>
                    <th style="font-size: 13px">Oid</th>
                    <th style="font-size: 13px">Nama SBU</th>
                    <th style="font-size: 13px">Nama Sub Holding</th>
                    <th style="font-size: 13px">Axtion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>3</td>  
                  <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>4</td>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>5</td>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>6</td>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>7</td>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>8</td>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>
                      <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                      <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm py-2" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
                {{-- hh --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>    
@endsection

 {{-- content modal create data --}}
 <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Tambah Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
              <option class="dropdown-item">Pilihan empat</option>
              <option class="dropdown-item">Pilihan lima</option>
            </select>
            <!-- <button type="submit" class="btn btn-primary">Create</button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create</button>
      </div>
    </div>
  </div>
</div>
{{-- end create --}}

{{-- content modal create data --}}
<div class="modal fade" id="editBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Edit Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
              <option class="dropdown-item">Pilihan empat</option>
              <option class="dropdown-item">Pilihan lima</option>
            </select>
            <!-- <button type="submit" class="btn btn-primary">Create</button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
</div>
{{-- end create --}}