<?php
include_once "../models/db.php";
include_once "../models/diseases.php";
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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Lafayi-your health matters!</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
  </head>

  <body>
    <!-- Nav bar -->
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-light">
      <ul class="navbar-nav text-white">
        <li class="nav-item">
          <a class="nav-link text-white" href="./form.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./updateFAQ.php">Menu_update</a>
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
      $pdo = $db->connectToDB(); $sql = $pdo->prepare("SELECT * FROM admins
          WHERE id = $id "); $sql->execute(); $fetch = $sql->fetch(); ?>
          <li class="nav-item">
            <a class="nav-link text-white"><?php echo $fetch["username"]; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../controllers/logout.php"
              >Logout &nbsp; &nbsp;<i
                class="fa fa-sign-out text-white"
                aria-hidden="true"
              ></i
            ></a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Title-->
    <div>
      <h1 class="text-center mt-3">Update Components of Lafiya</h1>
    </div>
    <div class="row mt-5">
      <div class="col-2">
        <div class="list-group">
          <a
            href="./updateFAQ.php"
            class="list-group-item list-group-item-action"
           
          >
            Update FAQs
          </a>
          <a href="./updatediseases.php" class="list-group-item list-group-item-action  active" aria-current="true"
            >Update Health Conditions</a
          >
          <a href="./updatePrice.php" class="list-group-item list-group-item-action"
            >Update Subscription Price</a
          >
        </div>
      </div>
      <div class="container col-10">
      <div class="row mb-5 justify-content-center">
          <div class="col-md-10 content-center card">
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center mt-3 mb-5">Update Disease/Healthcondition</h3>
              </div>
              <form method="POST" action="../controllers/diseasesData.php">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Disease One </label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="disease1"
                        placeholder="disease"
                      />
                    </div>
                  </div>
  
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Disease Two </label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="disease2"
                        placeholder="disease"
                      />
                    </div>
                  </div>
  
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleFormControlInput1"
                        >Disease Three
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="disease3"
                        placeholder="disease"
                      />
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Disease Four </label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="disease4"
                        placeholder="disease"
                      />
                    </div>
                  </div>
  
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Disease Five </label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput1"
                        name="disease5"
                        placeholder="disease"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group mt-4 text-center">
              <button class="btn btn-primary">Save Changes</button>
            </div>
              </form>
              <?php

      $sql = $pdo->prepare("SELECT disease FROM diseasename"); $sql->execute();
             $fetch = $sql->fetchAll(); ?>
              <div class="container mt-4">
                <div class="card">
                  <div class="card-body">
                  <p class="card-title"> Available Diseases </p>
                  <div class="card-text">  <?php  echo json_encode($fetch) ?></div>
                  </div>
                 
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
