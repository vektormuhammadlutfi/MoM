<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoM Tracking System | {{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      {{-- CSS Local --}}
  <link rel="stylesheet" href="{{URL::asset('/assets/css/styleLogin.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="row">
            <div class="col-md-5">
                <div class="container px-lg-5 px-md-3 d-flex flex-column justify-content-between"
                    style="height: 100vh;">
                    <div class="top">
                        <div class="login-header py-5">
                            <img src="{{URL::asset('./logo.png')}}" style="width:150px;" alt="">
                        </div>
                        <div class="login-body py-lg-5">
                            <form action="" method="post">
                                <div class="">
                                    <h1 class="title mx-0 px-0">mom tracking system</h1>
                                    <p class="mx-0 px-0 mt-3" style="color: rgba(0,0,0,0.5);">Silahkan Login Sebagai
                                        Admin
                                    </p>
                                </div>
                                <div class="row py-5">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="floatingInput">
                                            <label for="floatingInput" class="floating-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="floatingPassword">
                                            <label for="floatingPassword" class="floating-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 text-lg-end mt-lg-0 mt-3">
                                        <div class="d-grid d-lg-block">
                                            <button class="btn btn-success rounded-1 fw-bold px-4 py-2">LOGIN</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="login-footer text-center">
                        <p class="footer">2022 © Developed By ICT Kalla Group</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 d-none d-md-block">
                <div class="login-bg" style="background-image: url('{{URL::asset('/assets/img/bg.png')}}');"></div>
            </div>
        </div>
    </div>
</body>