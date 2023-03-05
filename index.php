<?php 

  include 'db.php';
  $test = "just a test";

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

  </head>
  <body onload="loading_subjects();">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">LMS</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
                
              </div>
            </nav>
<br><br>

<div class="row">
  <div class="col-lg-4 offset-lg-4">
    <div class="card">
      <img src="images/image2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="username">USERNAME</label>
            <input type="text" class="form-control" id="username">
          </div>
          <div class="col-lg-12">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="password">
          </div>
          <div class="col-lg-12">
            <br>
            <button onclick="logins()" class="btn btn-success">Login</button>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      function logins(){
        var username = $('#username').val();
        var password = $('#password').val();


        window.location = 'verify.php?uname='+username+'&passw='+password;
      }
    

    </script>

  </body>
</html>