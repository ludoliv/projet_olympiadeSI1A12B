<html class="h-100">
<head>
  <link rel="stylesheet" href="../../css/index.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.print.css"/>
</head>

<body class="h-100">
  <?php session_start();
  $_SESSION['connect']=0;
  if(!isset($_SESSION['loginOK'])){
    header('Location: ../protection/connexion.php');
  }?>

  <?php
    include 'menu_admin.php';
    include '../Interactions/InteractionsBD.php';
    include '../Interactions/Connexion.php';

    $db = connect_database();
    $all_grp = array();
    $all_jury = array();
    $all_hours = array();

    try{
      $stmt = $db->prepare("SELECT NumGroupe FROM GROUPE where NumGroupe != 0");
      $stmt->execute();

      $stmt2 = $db->prepare("SELECT NumJury FROM JURY");
      $stmt2->execute();

      $stmt3 = $db->prepare("SELECT hDeb, hFin FROM HEURE");
      $stmt3->execute();

      while($row = $stmt->fetch()){
        array_push($all_grp,$row['NumGroupe']);
      }

      while($row = $stmt2->fetch()){
        array_push($all_jury,$row['NumJury']);
      }

      while($row = $stmt3->fetch()){
        array_push($all_hours, $row['hDeb']." - ".$row['hFin']);
      }
    }
    catch(Exception $e){}
  ?>
  <center><h1>Planning</h1></center>

  <div class="container">
    <div class="container">
      <div id="options" class="row">
        <div class="col-10">
          <button id="day" class="btn btn-dark">Jour</button>
          <button id="list-day" class="btn btn-dark">Jour(liste)</button>
          <button id="week" class="btn btn-dark">Semaine</button>
          <button id="month" class="btn btn-dark">Mois</button>
        </div>
        <div id="navigation" class="col-2">
          <button id="prev" class="btn btn-dark">Prev</button>
          <button id="next" class="btn btn-dark">Next</button>
        </div>
      </div>
      <div class="row">
        <div id="planning" class="col-12"></div>
      </div>
    </div>
    <div class="container-fluid">
      <div id="outils" class="row">
        <div id="ajout" class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div>
            <form id="add-task-form" class="jumbotron bg-dark text-white">
              <h1 class="h1 text-center">Nouvelle tâche</h1>
              <div class="form-group form-row">
                <label for="jury" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Jury</label>
                <div class="col-12 col-sm-10 col-md-12 col-lg-12">
                  <select id="jury" class="form-control">
                    <option value="-1"></option>
                    <?php
                    for($i = 0; $i<sizeof($all_jury); $i++){
                      echo '<option value="'.$all_jury[$i].'"> Jury n°'.$all_jury[$i].'</option>';
                    }
                     ?>
                  </select>
                </div>
              </div>

              <div class="form-group form-row">
                <label for="grp" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Groupe</label>
                <div class="col-12 col-sm-10 col-md-12 col-lg-12">
                  <select id="grp" class="form-control">
                    <option value="-1"></option>
                    <?php
                    for($i = 0; $i<sizeof($all_grp); $i++){
                      echo '<option value="'.$all_grp[$i].'"> Groupe n°'.$all_grp[$i].'</option>';
                    }
                     ?>
                  </select>
                </div>
              </div>

              <div class="form-group form-row">
                <label for="date" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Date</label>
                <div class="col-12 col-sm-10 col-md-12 col-lg-12">
                  <input type="date" pattern="yyyy-mm-dd" id="date" class="form-control"></input>
                </div>
              </div>

              <div class="form-group form-row">
                <label for="hours" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Heure</label>
                <div class="col-12 col-sm-10 col-md-12 col-lg-12">
                  <select id="hours" class="form-control">
                    <option value="-1"></option>
                    <?php
                    for($i = 0; $i<sizeof($all_hours); $i++){
                      echo '<option value="'.$all_hours[$i].'">'.$all_hours[$i].'</option>';
                    }
                     ?>
                  </select>
                </div>
              </div>

              <div class="form-row justify-content-center">
                <div id="errors" class="col-12 col-sm-10 col-md-11 col-lg-12">
                  <ul id="list-err"></ul>
                </div>
                <button id="task-add" type="button" class="btn btn-light"> Ajouter </button>
              </div>
            </form>
          </div>
        </div>
        <div id="details" class="col-12 col-sm-12 col-md-12 col-lg-12">
        </div>

      </div>
    </div>
  </div>
<script src="planning.js" charset="utf-8"></script>
</body>

</html>
