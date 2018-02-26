<html>
<head>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>

<body>
  <?php session_start();
  $_SESSION['connect']=0;
  if(!isset($_SESSION['loginOK'])){
    header('Location: connexion.php');
  }?>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="accueil_admin.php">Accueil</a>
    <a href="resultats_admin.php">Résultats</a>
    <a href="parametrage.php">Paramétrage</a>
    <a href="planning.php">Planning</a>
    <a href="jury.php">Jury</a>
    <a href="deconnexion.php">Déconnexion</a>
  </div>

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  <center><h1>Planning</h1></center>

  <div style="padding: 5%">
    <form>
      <table class="table table-sm">
        <tr style="text-align: center;">
          <td></td>
          <?php
          $nb_jury = 8;
          $nb_grp = 11;
          for($i=1;$i<$nb_jury;$i++)
          {
            echo "<th>Jury ".$i."</th>";
          }
          ?>
        </tr>
        <tr>
          <td>09h40 - 10h00</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>

        </tr>
        <tr>
          <td>10h00 - 10h20</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>
        </tr>
        <tr>
          <td>10h20 - 10h40</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>
        </tr>
        <tr>
          <td>10h40 - 10h50</td>
          <td colspan=<?php echo $nb_jury; ?> style="text-align: center;">Pause</td>
        </tr>
        <tr>
          <td>10h50 - 11h10</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>
        </tr>
        <tr>
          <td>11h10 - 11h30</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>
        </tr>
        <tr>
          <td>11h30 - 11h50</td>
          <?php
          for($i=1;$i<$nb_jury;$i++){
            ?>
            <td>
              <center>
                <select>
                  <option value="none"></option>
                  <?php
                  for($j=1;$j<$nb_grp;$j++){?>
                    <option value=<?php echo $j ; ?> > <?php echo "Groupe ".$j ;?></option>;
                  <?php } ?>
                </select>
              </center>
            </td>
            <?php
          }
          ?>
        </tr>
      </table>
      <input type="submit" class="btn btn-dark">
    </form>
  </div>



  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
</body>

</html>
