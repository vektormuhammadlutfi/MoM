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
        <h2 class="mt-2">Data SBU</h2>
        <div class="d-flex flex-row-reverse">
          <a href="/sbu" class="btn btn-primary mb-2 py-1">Tambah Data</a>
        </div>
        <table id="example" class="mt-5 table table-striped table-bordered" style="width:100%">
          <thead>
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
                    <a  href="/sbu" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>3</td>  
                <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>4</td>
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>5</td>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>6</td>
                  <td>Brielle Williamson</td>
                  <td>Integration Specialist</td>
                  <td>New York</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>7</td>
                  <td>Herrod Chandler</td>
                  <td>Sales Assistant</td>
                  <td>San Francisco</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>8</td>
                  <td>Rhona Davidson</td>
                  <td>Integration Specialist</td>
                  <td>Tokyo</td>
                  <td>
                    <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                  </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              {{-- gg --}}
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
              {{-- hh --}}
              <tr>
                <td>10</td>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>
                  <a  href="/sbu" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a  href="/sbu" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash-can"></i></a>
                </td>
                
              {{-- </tr>
              <tr>
                  <td>Jena Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>30</td>
                  <td>2008-12-19</td>
                  <td>$90,560</td>
              </tr>
              <tr>
                  <td>Quinn Flynn</td>
                  <td>Support Lead</td>
                  <td>Edinburgh</td>
                  <td>22</td>
                  <td>2013-03-03</td>
                  <td>$342,000</td>
              </tr>
              <tr>
                  <td>Charde Marshall</td>
                  <td>Regional Director</td>
                  <td>San Francisco</td>
                  <td>36</td>
                  <td>2008-10-16</td>
                  <td>$470,600</td>
              </tr>
              <tr>
                  <td>Haley Kennedy</td>
                  <td>Senior Marketing Designer</td>
                  <td>London</td>
                  <td>43</td>
                  <td>2012-12-18</td>
                  <td>$313,500</td>
              </tr>
              <tr>
                  <td>Tatyana Fitzpatrick</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>19</td>
                  <td>2010-03-17</td>
                  <td>$385,750</td>
              </tr>
              <tr>
                  <td>Michael Silva</td>
                  <td>Marketing Designer</td>
                  <td>London</td>
                  <td>66</td>
                  <td>2012-11-27</td>
                  <td>$198,500</td>
              </tr>
              <tr>
                  <td>Paul Byrd</td>
                  <td>Chief Financial Officer (CFO)</td>
                  <td>New York</td>
                  <td>64</td>
                  <td>2010-06-09</td>
                  <td>$725,000</td>
              </tr>
              <tr>
                  <td>Gloria Little</td>
                  <td>Systems Administrator</td>
                  <td>New York</td>
                  <td>59</td>
                  <td>2009-04-10</td>
                  <td>$237,500</td>
              </tr>
              <tr>
                  <td>Bradley Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>41</td>
                  <td>2012-10-13</td>
                  <td>$132,000</td>
              </tr>
              <tr>
                  <td>Dai Rios</td>
                  <td>Personnel Lead</td>
                  <td>Edinburgh</td>
                  <td>35</td>
                  <td>2012-09-26</td>
                  <td>$217,500</td>
              </tr>
              <tr>
                  <td>Jenette Caldwell</td>
                  <td>Development Lead</td>
                  <td>New York</td>
                  <td>30</td>
                  <td>2011-09-03</td>
                  <td>$345,000</td>
              </tr>
              <tr>
                  <td>Yuri Berry</td>
                  <td>Chief Marketing Officer (CMO)</td>
                  <td>New York</td>
                  <td>40</td>
                  <td>2009-06-25</td>
                  <td>$675,000</td>
              </tr>
              <tr>
                  <td>Caesar Vance</td>
                  <td>Pre-Sales Support</td>
                  <td>New York</td>
                  <td>21</td>
                  <td>2011-12-12</td>
                  <td>$106,450</td>
              </tr>
              <tr>
                  <td>Doris Wilder</td>
                  <td>Sales Assistant</td>
                  <td>Sydney</td>
                  <td>23</td>
                  <td>2010-09-20</td>
                  <td>$85,600</td>
              </tr>
              <tr>
                  <td>Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2009-10-09</td>
                  <td>$1,200,000</td>
              </tr>
              <tr>
                  <td>Gavin Joyce</td>
                  <td>Developer</td>
                  <td>Edinburgh</td>
                  <td>42</td>
                  <td>2010-12-22</td>
                  <td>$92,575</td>
              </tr>
              <tr>
                  <td>Jennifer Chang</td>
                  <td>Regional Director</td>
                  <td>Singapore</td>
                  <td>28</td>
                  <td>2010-11-14</td>
                  <td>$357,650</td>
              </tr>
              <tr>
                  <td>Brenden Wagner</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>28</td>
                  <td>2011-06-07</td>
                  <td>$206,850</td>
              </tr>
              <tr>
                  <td>Fiona Green</td>
                  <td>Chief Operating Officer (COO)</td>
                  <td>San Francisco</td>
                  <td>48</td>
                  <td>2010-03-11</td>
                  <td>$850,000</td>
              </tr>
              <tr>
                  <td>Shou Itou</td>
                  <td>Regional Marketing</td>
                  <td>Tokyo</td>
                  <td>20</td>
                  <td>2011-08-14</td>
                  <td>$163,000</td>
              </tr>
              <tr>
                  <td>Michelle House</td>
                  <td>Integration Specialist</td>
                  <td>Sydney</td>
                  <td>37</td>
                  <td>2011-06-02</td>
                  <td>$95,400</td>
              </tr>
              <tr>
                  <td>Suki Burks</td>
                  <td>Developer</td>
                  <td>London</td>
                  <td>53</td>
                  <td>2009-10-22</td>
                  <td>$114,500</td>
              </tr>
              <tr>
                  <td>Prescott Bartlett</td>
                  <td>Technical Author</td>
                  <td>London</td>
                  <td>27</td>
                  <td>2011-05-07</td>
                  <td>$145,000</td>
              </tr>
              <tr>
                  <td>Gavin Cortez</td>
                  <td>Team Leader</td>
                  <td>San Francisco</td>
                  <td>22</td>
                  <td>2008-10-26</td>
                  <td>$235,500</td>
              </tr>
              <tr>
                  <td>Martena Mccray</td>
                  <td>Post-Sales support</td>
                  <td>Edinburgh</td>
                  <td>46</td>
                  <td>2011-03-09</td>
                  <td>$324,050</td>
              </tr>
              <tr>
                  <td>Unity Butler</td>
                  <td>Marketing Designer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009-12-09</td>
                  <td>$85,675</td>
              </tr>
              <tr>
                  <td>Howard Hatfield</td>
                  <td>Office Manager</td>
                  <td>San Francisco</td>
                  <td>51</td>
                  <td>2008-12-16</td>
                  <td>$164,500</td>
              </tr>
              <tr>
                  <td>Hope Fuentes</td>
                  <td>Secretary</td>
                  <td>San Francisco</td>
                  <td>41</td>
                  <td>2010-02-12</td>
                  <td>$109,850</td>
              </tr>
              <tr>
                  <td>Vivian Harrell</td>
                  <td>Financial Controller</td>
                  <td>San Francisco</td>
                  <td>62</td>
                  <td>2009-02-14</td>
                  <td>$452,500</td>
              </tr>
              <tr>
                  <td>Timothy Mooney</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>37</td>
                  <td>2008-12-11</td>
                  <td>$136,200</td>
              </tr>
              <tr>
                  <td>Jackson Bradshaw</td>
                  <td>Director</td>
                  <td>New York</td>
                  <td>65</td>
                  <td>2008-09-26</td>
                  <td>$645,750</td>
              </tr>
              <tr>
                  <td>Olivia Liang</td>
                  <td>Support Engineer</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2011-02-03</td>
                  <td>$234,500</td>
              </tr>
              <tr>
                  <td>Bruno Nash</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>38</td>
                  <td>2011-05-03</td>
                  <td>$163,500</td>
              </tr>
              <tr>
                  <td>Sakura Yamamoto</td>
                  <td>Support Engineer</td>
                  <td>Tokyo</td>
                  <td>37</td>
                  <td>2009-08-19</td>
                  <td>$139,575</td>
              </tr>
              <tr>
                  <td>Thor Walton</td>
                  <td>Developer</td>
                  <td>New York</td>
                  <td>61</td>
                  <td>2013-08-11</td>
                  <td>$98,540</td>
              </tr>
              <tr>
                  <td>Finn Camacho</td>
                  <td>Support Engineer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009-07-07</td>
                  <td>$87,500</td>
              </tr>
              <tr>
                  <td>Serge Baldwin</td>
                  <td>Data Coordinator</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2012-04-09</td>
                  <td>$138,575</td>
              </tr>
              <tr>
                  <td>Zenaida Frank</td>
                  <td>Software Engineer</td>
                  <td>New York</td>
                  <td>63</td>
                  <td>2010-01-04</td>
                  <td>$125,250</td>
              </tr>
              <tr>
                  <td>Zorita Serrano</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>56</td>
                  <td>2012-06-01</td>
                  <td>$115,000</td>
              </tr>
              <tr>
                  <td>Jennifer Acosta</td>
                  <td>Junior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>43</td>
                  <td>2013-02-01</td>
                  <td>$75,650</td>
              </tr>
              <tr>
                  <td>Cara Stevens</td>
                  <td>Sales Assistant</td>
                  <td>New York</td>
                  <td>46</td>
                  <td>2011-12-06</td>
                  <td>$145,600</td>
              </tr>
              <tr>
                  <td>Hermione Butler</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2011-03-21</td>
                  <td>$356,250</td>
              </tr>
              <tr>
                  <td>Lael Greer</td>
                  <td>Systems Administrator</td>
                  <td>London</td>
                  <td>21</td>
                  <td>2009-02-27</td>
                  <td>$103,500</td>
              </tr>
              <tr>
                  <td>Jonas Alexander</td>
                  <td>Developer</td>
                  <td>San Francisco</td>
                  <td>30</td>
                  <td>2010-07-14</td>
                  <td>$86,500</td>
              </tr>
              <tr>
                  <td>Shad Decker</td>
                  <td>Regional Director</td>
                  <td>Edinburgh</td>
                  <td>51</td>
                  <td>2008-11-13</td>
                  <td>$183,000</td>
              </tr>
              <tr>
                  <td>Michael Bruce</td>
                  <td>Javascript Developer</td>
                  <td>Singapore</td>
                  <td>29</td>
                  <td>2011-06-27</td>
                  <td>$183,000</td>
              </tr>
              <tr>
                  <td>Donna Snider</td>
                  <td>Customer Support</td>
                  <td>New York</td>
                  <td>27</td>
                  <td>2011-01-25</td>
                  <td>$112,000</td>
              </tr> --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
    
@endsection