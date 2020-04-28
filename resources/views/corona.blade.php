<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Covid-19</title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <div class="container-fluid">
      <h1>Sebaran Kasus Covid-19 di Indonesia</h1>

      <div class="row text-center">
         <div class="col-md-4 mb-3">
            <h6 class="text-warning font-weight-bold">Positif</h6>
            
            <div>{!! $positivechart->container() !!}</div>
         </div>
         <div class="col-md-4 mb-3">
            <h6 class="text-success font-weight-bold">Sembuh</h6>
            
            <div>{!! $healthChart->container() !!}</div>
         </div>
         <div class="col-md-4 mb-3">
            <h6 class="text-danger font-weight-bold">Meninggal</h6>
            
            <div>{!! $deathChart->container() !!}</div>
         </div>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
   {!! $positivechart->script() !!}
   {!! $healthChart->script() !!}
   {!! $deathChart->script() !!}
</body>
</html>