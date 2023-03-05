<?php 
session_start();
  include 'db.php';

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
                    <a class="nav-link" href="#">User: <?php echo strtoupper($_SESSION['username']); ?> <span class="sr-only">(current)</span></a>
                  </li>

                </ul>
                <i onclick="loads()" class="ri-add-circle-line" class="float-right"></i>
              </div>
            </nav>
<br><br>

    <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>
              <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="ri-add-circle-fill"></i> Add New Subject
              </button>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <div class="col-lg-12">
                  <label for="subj_code"> Code</label>
              <input type="text" class="form-control" id="subj_code" placeholder="Subject Code">
                </div>

            </div>            
          </div>
        </div>  

        <div class="row">
          <div class="col-lg-12">
            <hr>
            <div id="load_all_subjects">Loading data</div>
          </div>
        </div>

    </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"> Add Subject</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="subj_code"> Code</label>
              <input type="text" class="form-control" id="subj_code" placeholder="Subject Code">
            </div>
            <div class="form-group">
              <label for="subj_desc"> Description</label>
              <input type="text" class="form-control" id="subj_desc" placeholder="Enter Description">
            </div>


          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-default" data-dismiss="modal"> Cancel</button>

            <button onclick="saving_subjects()" type="submit" class="btn btn-default btn-success" data-dismiss="modal"><i class="ri-save-3-fill"></i> Save</button>          
        </div>
      </div>
    </div>
  </div>


    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      function getval(description, autonum){
        var description = description.innerText;
        var autonum = autonum;
           $.ajax({
              type: "POST",
              url: "query.php",
              data: {
                "update_subject": "1",
                "description" : description,
                "autonum" : autonum                               
              },
              success: function (x) {
                  loading_subjects();
              }
            });

      }

      //removing subject code
      function remove_subject(autonum){
        var autonum = autonum;

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
           $.ajax({
              type: "POST",
              url: "query.php",
              data: {
                "remove_subject": "1",
                "autonum" : autonum               
              },
              success: function (x) {
                  loading_subjects();
              }
            });

          } else {
            
          }
        });
      }


      //load subjects
      function loading_subjects(){
           $.ajax({
              type: "POST",
              url: "query.php",
              data: {
                "load_subject": "1"               
              },
              success: function (x) {
                  $('#load_all_subjects').html(x);
              }
            });  
      }

      //code sa save
      function saving_subjects(){
        var subj_code = $('#subj_code').val();
        var subj_desc = $('#subj_desc').val();
        
           $.ajax({
              type: "POST",
              url: "query.php",
              data: {
                "save_subject": "1",
                "subj_code" : subj_code,
                "subj_desc" : subj_desc                
              },
              success: function (response) {
                  swal({
                  title: "Success!",
                  text: "Successfuly saved!",
                  icon: "success",
                  button: "Ok",
                });

                  loading_subjects();
              }
            });
      }


      //itong code na ito ay para sa modal
      function loads(){
        $("#myModal").modal();
      }

    </script>

  </body>
</html>