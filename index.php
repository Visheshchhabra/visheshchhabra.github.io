<?php
include "logic.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Covid-19 Tracker</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"
    <!--bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <!--Javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <!--link the css-->
    <link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </head>
  <body>
    <div class="container-fluid bg-light p-5 text-center my-3">
      <h1>Covid-19 Tracker</h1>
      <h5 class="text-muted">by Vishesh Chhabra</h5>
    </div>
    <div class="container ">
<h2 class="text-center py-4">Worldwide Stats</h2>
      <div class="row text-center my-4">

        <div class="col-lg-4 md-4 col-12 text-warning">
          <h5>Total Confirmed Cases</h5>
          <?php echo $total_cases; ?>
        </div>
        <div class="col-lg-4 md-4 col-12 text-success">
          <h5>Total Confirmed Recovered</h5>
          <?php echo $total_recovered; ?>
        </div>
        <div class="col-lg-4 md-4 col-12 text-danger">
          <h5>Total Deceased</h5>
          <?php echo $total_deaths; ?>
        </div>
    </div>
    <div class="container bg-light p-3 my-3 text-center">
      <h5 class="text-info">Prevention is the only Cure.</h5>
      <p class="text-muted">Stay Home and stay safe</p>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Countries</th>
            <th scope="col">Confirmed</th>
            <th scope="col">Recovered</th>
            <th scope="col">Deceased</th>
          </tr>
        </thead>
        <tbody>
          <?php     // We cannot place html in between the php tags so to avoid that ,Doing this in order to get the space between the tags
          foreach ($data as $key => $value) {
            $increase1 =$value[$days_count]['confirmed']-$value[$days_count_prev_day]['confirmed'];
            $increase2 =$value[$days_count]['recovered']-$value[$days_count_prev_day]['recovered'];
            $increase3 =$value[$days_count]['deaths']-$value[$days_count_prev_day]['deaths'];

            ?>
            <tr>
              <th><?php echo $key;?></th>
              <td><?php echo $value[$days_count]["confirmed"] ?>

              <small class="text-warning pl-3"><i class="fa fa-arrow-up"></i><?php if($increase1!=0)echo $increase1; ?></small>
              </td>
              <td><?php echo $value[$days_count]["recovered"] ?>
                <small class="text-success pl-3"><i class="fa fa-arrow-up"></i><?php if($increase2!=0)echo $increase2; ?></small>

              </td>
              <td><?php echo $value[$days_count]["deaths"] ?>
                <small class="text-danger pl-3"><i class="fa fa-arrow-up"></i><?php if($increase3!=0)echo $increase3; ?></small>

              </td>
            </tr>
            <?php   } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container ">
    <h2 class="text-center py-3">Indian Stats</h2>
    <div class="row text-center my-4">

      <div class="col-lg-3 md-3 col-12 text-warning">
        <h5>Total Confirmed Cases</h5>
        <p id="confirmed"></p>
      </div>
      <div class="col-lg-3 md-3 col-12 text-info">
        <h5>Total Active Cases</h5>
        <p id="active"></p>
      </div>
      <div class="col-lg-3 md-3 col-12 text-success">
        <h5>Total Confirmed Recovered</h5>
        <p id="recovered"></p>
      </div>
      <div class="col-lg-3 md-3 col-12 text-danger">
        <h5>Total Deceased</h5>
        <p id="deaths"></p>
      </div>
  </div>
    <h3>StateWise Chart View</h3>
    <canvas id="myCanvas">
    </canvas>
    <div class="container text-center my-5">
      <h6>
        *click on the Confirmed/Recovered/Deaths tabs above to see the individual charts
      </h6>
    </div>
  </body>
  <footer class="footer mt-auto py-5 bg-light">
  <div class="container text-center">
    <span class="text-muted">Copyright &copy 2020 Vishesh Technologies</span>
  </div>
</footer>
  </html>
</html>
