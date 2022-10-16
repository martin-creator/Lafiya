<?php
include_once "../models/db.php";
session_start();

if (!isset($_SESSION["user"])) {
  header("location: ../views/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Lafayi-your health matters!</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
</head>

<body class="bg-success">
  <!-- Nav bar -->
  <!-- Grey with black text -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-light">
    <ul class="navbar-nav text-white">
      <li class="nav-item">
        <a class="nav-link text-white" href="./form.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="./summary.php">Summary</a>
      </li>
    </ul>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
      <?php
      $id = $_SESSION["user"];
      $db = new DBConnector();
      $pdo = $db->connectToDB();
      $sql = $pdo->prepare("SELECT * FROM admins WHERE id = $id ");
      $sql->execute();
      $fetch = $sql->fetch();
      ?>
      <li class="nav-item">
          <a class="nav-link text-white" ><?php echo $fetch["username"]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../controllers/logout.php">Logout &nbsp; &nbsp;<i class="fa fa-sign-out text-white"
              aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- Title-->
  <div>
    <h1 class="text-center mt-3 text-white">
      Welcome to the Health USSD Planet!
    </h1>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5 card mr-5">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center mt-3">Send Message to a User</h3>
          </div>

          <form class="card-text mt-3" method="POST" action="../controllers/sendonesms.php">
            <div class="form-group required">
              <label for="exampleFormControlInput1">Phone Number</label>
              <input type="tel" class="form-control" id="exampleFormControlInput1" name="phoneNumber"
                placeholder="+25678965412" required />
            </div>

            <div class="form-group required">
              <label for="exampleFormControlTextarea1">Message(Max 182 characters)</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"
                required></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-danger">Send SMS</button>
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-5 card">
        <div class="card-body">
          <div class="card-title">
            <h3 class="text-center mt-3">Send Message to Many Users</h3>
          </div>
          <form class="card-text mt-3" method="POST" action="../controllers/sendmanysms.php">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Health Condition</label>
              <select class="form-control" id="exampleFormControlSelect1" name="disease" required>
                <option>Diabetes</option>
                <option>Hypertention</option>
                <option>Cancer</option>
                <option>Stroke</option>
                <option>Depression</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Subscription Plan</label>
              <select class="form-control" id="exampleFormControlSelect1" name="subscriptionPlan" required>
                <option>Daily</option>
                <option>Weekly</option>
                <option>Monthly</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message (Max 182 characters)</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"
                required></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-danger">Send SMS</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>