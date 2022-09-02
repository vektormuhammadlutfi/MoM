@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Sub Brach Unit</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')


{{-- content utama dibawah ini yaa --}}
<div class="card shadow-lg bg-body" style="
    margin: -150px auto 90px auto;
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    width: 95%">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h3 class="mb-0"><i class="fa-solid fa-list text-red"></i> Data SBU</h3>
          <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div>
        <hr class="mt-2 mb-4">
        {{-- table --}}
        <div class="table-responsive">
          <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
            <thead >
                <tr>
                    <th style="font-size: 13px">No</th>
                    <th style="font-size: 13px">Oid</th>
                    <th style="font-size: 13px">Nama SBU</th>
                    <th style="font-size: 13px">Nama Sub Holding</th>
                    <th style="font-size: 13px">Action</th>
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



 {{-- footer gaess --}}
  <div class="container-fluid mt--7">
    <div class="row mt-5" style="min-height: 200px">
    </div>
    <!-- Footer -->
    @include('layout.footer')
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

{{-- content modal edit data --}}
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
