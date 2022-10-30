<?php
session_start();
require "../models/db.php";
include_once '../models/gravatar.php';

if (!isset($_SESSION["user"])) {
  header("location: ../views/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js" integrity="sha512-cEgdeh0IWe1pUYypx4mYPjDxGB/tyIORwjxzKrnoxcif2ZxI7fw81pZWV0lGnPWLrfIHGA7qc964MnRjyCYmEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Lafayi-your health matters!</title>
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
</head>

<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-light">
        <ul class="navbar-nav text-white">
            <li class="nav-item">
                <a class="nav-link  text-white" href="./form.php">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link  text-white" href="./updateFAQ.php">Menu_update</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link  text-white" href="./summary.php">Summary</a>
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
            $gravatar = new Gravatar();
            ?>
            <li class="nav-item">
          <img src="<?php echo $gravatar->get_gravatar($fetch["email"]); ?>" alt="image" />
        </li>
      <li class="nav-item">
          <a class="nav-link text-white" ><?php echo $fetch["username"]; ?></a>
        </li>
                <li class="nav-item">
                    <a class="nav-link  text-white" href="../controllers/logout.php">Logout &nbsp; &nbsp;<i class="fa fa-sign-out text-white"
                            aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Title-->
    <div>
        <h1 class="text-center mt-3 mb-5"> Monitor Your Application Usage </h1>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-6 card">
                <h4 class="text-center card-title mt-4  "> Subscription Plan Vs Number of subscribers</h4>
                <canvas id="mycanvas"></canvas>
            </div>

            <div class=" col-6 card ">
                <h4 class="text-center card-title mt-4 "> Health Condition Vs Number of subscribers</h4>
                <canvas id="myhealthcanvas"></canvas>
            </div>

        </div>

    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-6 card">
                <h4 class="text-center card-title mt-4 "> Age Range Vs Number of subscribers</h4>
                <canvas id="myage"></canvas>
            </div>

            <div class=" col-6  card">
                <h4 class="text-center card-title mt-4 "> Subscribed Vs Unsubcribed Users </h4>
                <canvas id="mysubstatus"></canvas>
            </div>

        </div>


    </div>


    <!-- javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="../controllers/chartjs/subscriptionplans.js"></script>
    <script type="text/javascript" src="../controllers/chartjs/healthcondition.js"></script>
    <script type="text/javascript" src="../controllers/chartjs/age.js"></script>
    <script type="text/javascript" src="../controllers/chartjs/subscriptionstatus.js"></script>



    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>