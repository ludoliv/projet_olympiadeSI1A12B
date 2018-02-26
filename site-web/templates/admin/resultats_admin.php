<html>
<head>
  <link rel="stylesheet" href="../../css/index.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>

<body>
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
  ?>

  <center><h1>Résultats finaux</h1></center>

  <div>
    <div style="padding-top: 1% ; padding-left: 5% ; padding-right: 5% ; padding-bottom: 2%">
      <table class="table table-striped" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
            <th>Équipe</th>
            <th>Originalité</th>
            <th>Prototype</th>
            <th>Démarche SI</th>
            <th>Pluridisciplinarité</th>
            <th>Maîtrise</th>
            <th>Développement Durable</th>
            <th>Moyenne</th>
          </tr>
        </thead>
        <?php
        $all_grp = array();
        try{
          $stmt = $db->prepare("SELECT NumGroupe FROM GROUPE where NumGroupe != 0");
          $stmt->execute();

          while($row = $stmt->fetch()){
            array_push($all_grp,$row['NumGroupe']);
            $liste = getNote($db,$row['NumGroupe']);
            echo "<tr>";
            echo "<td>".$row['NumGroupe']."</td>";

            if(is_nan($liste['Originalite'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['Prototype'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['DemarcheSI'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['pluriDisciplinarite'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['Maitrise'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['devDurable'])){
              echo "<td>". "/" ."</td>";
            }
            if(is_nan($liste['Originalite']) OR is_nan($liste['Prototype']) OR is_nan($liste['DemarcheSI']) OR is_nan($liste['pluriDisciplinarite']) OR is_nan($liste['Maitrise']) OR is_nan($liste['devDurable'])){
              echo "<td>". "/" ."</td>";
            }
            else{
              echo "<td>".$liste['Originalite']."</td>";
              echo "<td>".$liste['Prototype']."</td>";
              echo "<td>".$liste['DemarcheSI']."</td>";
              echo "<td>".$liste['pluriDisciplinarite']."</td>";
              echo "<td>".$liste['Maitrise']."</td>";
              echo "<td>".$liste['devDurable']."</td>";
              echo "<td>".($liste['Originalite'] + $liste['Prototype'] + $liste['DemarcheSI'] + $liste['pluriDisciplinarite'] + $liste['Maitrise'] + $liste['devDurable'])/7 ."</td>";
            }

            echo "</tr>";
          }
        }
        catch(Exception $e){
          echo $e.getMessage();
        }
        ?>
      </table>
    </div>

    <div style="padding-left: 5% ; padding-right: 5%">
      <h3>Attribution des prix :</h3>
      <form method="post" action="insert_res.php">
        <table class="table">
          <tr>
            <td>Originalité</td>
            <td>
              <select name="originalite">
                <option value="none"></option>
                <?php
                  foreach ($all_grp as $num) {
                    echo "<option value='".$num."'>Groupe ".$num."</option>";
                  }?>
              </select>
            </td>
            <td>Prototype</td>
            <td>
              <select name="prototype">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
            <td>Démarche SI</td>
            <td>
              <select name="demarche_si">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>Pluridisciplinarité</td>
            <td>
              <select name="pluridisciplinarite">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
            <td>Maîtrise</td>
            <td>
              <select name="maitrise">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
            <td>Développement durable</td>
            <td>
              <select name="developpement_durable">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>Moyenne</td>
            <td>
              <select name="moyenne">
                <option value="none"></option>
                <?php foreach ($all_grp as $num) {
                  echo "<option value='".$num."'>Groupe ".$num."</option>";
                } ?>
              </select>
            </td>
          </tr>
        </table>
        <center>
          <div>
            <input class="btn btn-dark" type="submit" value="Attribuer"/>
            <input class="btn btn-dark" type="reset" value="Réinitialiser"/>
          </div>
        </center>
      </form>
    </div>
  </div>

</body>
</html>
