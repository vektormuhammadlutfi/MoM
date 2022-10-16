<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    
  </head>
  <body>
      <h3 class="mb-4 text-center" style="font-size: 20px" >MOM REPORT DOCUMENTATION</h3>
      @foreach ($description as $item)
      <div class="mb-5">
        <div class="row" >
          <h4 class="col" style="font-size: 18px">Oid MoM: <span>{{ $item->oid_mom }}</span></h4>
        </div>
        <img src="storage\{{$item->gambar}}" class="img-fluid" style="max-width: 50%" alt="Responsive image">
      </div>
      @endforeach
  </body>
</html>