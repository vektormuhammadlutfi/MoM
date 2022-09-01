@extends('layout.coreview')

@section('content')
<div class="main-content">
  @include('navbar.nav')
  @include('navbar.navbg')

  <div class="card shadow-lg bg-body" style="
    margin: -150px auto 90px auto;
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    width: 95%
    ">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Data Branch</h3>
          <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div>
        <hr class="mt-2 mb-4">
        <div class="table-responsive">
          <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
            <thead >
                <tr>
                    <th style="font-size: 13px">No</th>
                    <th style="font-size: 13px">Oid Branch</th>
                    <th style="font-size: 13px">Nama Branch</th>
                    <th style="font-size: 13px">Oid SBU</th>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>                    
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                      <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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
                    <a  href="/detailbranch" class="btn btn-primary btn-sm py-2" ><i class="fa-regular fa-eye"></i></a>
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