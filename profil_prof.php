<?php
session_start();
include 'database.php';
global $connect;

if(isset($_GET['userID']) AND ($_GET['userID'] > 0)) {
  $getUserID = intval($_GET['userID']); //convertir ce que met l'user en nombre
  $queryuser = $connect->prepare("SELECT * FROM user WHERE userID = ?");
  $queryuser->execute(array($getUserID));
  $userinfo = $queryuser->fetch();

  ?>

  <html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Profil prof</title>
  </head>
  <body>
    <?php include 'menu_nav.php'; ?>

    <div class="profil">
      <div class="profilDonne">
        <h2>Profil de <?php echo $userinfo['username']; ?></h2>
        <img class="photoprofil" src="assets/img/prof.png" alt="photo profil" width="120" height="120">
        <p>Mail : <?php echo $userinfo['email']; ?></p>
        <p>Nom : <?php echo $userinfo['lName']; ?></p>
        <p>prénom : <?php echo $userinfo['fName']; ?></p>
      <?php
      if(isset($_SESSION['userID']) AND $userinfo['userID'] == $_SESSION['userID']) { ?>
        <form action="" method="post">
          <input type="submit" name="Editer" value="Editer">
        </form>
      </div>
      <br/>
      <?php
        if(isset($_POST['Editer'])){
          header("Location: profil_edit.php");
        }
        ?>

        <div class="affichageExamenProfil">
          <?php
          $menuExamProfil = $connect->query('SELECT *  FROM examProfil INNER JOIN examTheme ON examProfil.examThemeID = examTheme.examThemeID');
          ?>
          <h2>Menu Examen</h2><br/>
          <form action="" method="post">
            <table ellspacing='0'>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titre Examen</th>
                  <th>Durée</th>
                  <th>Etudiant</th>
                  <th>Status</th>
                  <th>Résultat</th>
                  <th>Sélectionner</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($affichageDesExamens = $menuExamProfil->fetch())
                {?>
                    <tr>
                      <?php
                      echo "<td> $affichageDesExamens[examProfilID] </td>";
                      echo "<td> $affichageDesExamens[examThemeTitle] </td>";
                      echo "<td> $affichageDesExamens[examThemeTime] </td>";
                      $findUsername = $connect->query("SELECT * FROM user ");
                      while ($findUsernameSelect = $findUsername->fetch()) {
                        if ($findUsernameSelect["userID"] == $affichageDesExamens["userID"]) {
                          echo "<td> $findUsernameSelect[username] </td>";
                        }
                      }
                      if ($affichageDesExamens["examProfilStatus"] == 0) {
                        echo "<td> pas commencer </td>";
                      }
                      elseif ($affichageDesExamens["examProfilStatus"] == 1) {
                        echo "<td> terminer </td>";
                      }
                      elseif ($affichageDesExamens["examProfilStatus"] == 2) {
                        echo "<td> en cours </td>";
                      }
                      echo "<td> $affichageDesExamens[examProfilResult] </td>";
                      ?>
                      <?php
                      $menuExamSelect = $connect->query('SELECT * FROM examProfil INNER JOIN examTheme ON examProfil.examThemeID = examTheme.examThemeID ');
                      while ($examSelect = $menuExamSelect->fetch()) {
                          if ($affichageDesExamens["examProfilID"] == $examSelect["examProfilID"]) {?>
                            <td><input type="radio" name="examProfilIDChoix" value="<?php echo $examSelect["examProfilID"]; ?>"></td>
                            <?php
                          }
                      }
                      $menuExamSelect->closeCursor();
                      ?>
                    </tr>
                    <?php
                }
                ?>
              </tbody>
            </table>
            <?php
            $menuExamProfil->closeCursor();
            ?>
            <input type="submit" name="Vérifier" value="Vérifier">
          </form>

          <?php
          $menuExamSelect2 = $connect->query("SELECT * FROM examProfil");
          if(isset($_POST['Vérifier'])){
            if(!empty($_POST['examProfilIDChoix'])) {
              $_SESSION['examProfilID'] = $_POST['examProfilIDChoix'];
              $examProfilIDChoix = $_POST['examProfilIDChoix'];
              while ($examSelect2 = $menuExamSelect2->fetch()) {
                if ($examSelect2['examProfilID'] ==  $examProfilIDChoix){
                  if ($examSelect2['examProfilStatus'] == 0) {
                    echo "L'étudiant n'a pas commencé son examen";
                  }
                  elseif ($examSelect2['examProfilStatus'] == 2) {
                    echo "L'étudiant n'a pas fini son examen";
                  }
                  else {
                    $_SESSION['choixIdExam'] = $examSelect2['examThemeID'];
                    header("Location: resultat.php"); //Parfois le header ne fonctionne pas, de se fait j'utilise du javascript.
                    echo "<script type='text/javascript'>window.top.location='resultat.php';</script>"; exit;
                  }
                }
              }
            }
            else {
              echo 'Sélectionner une valeur.';
            }
          }
          ?>
          <?php
        }
        ?>
      </div>
    </div>
  </body>
  </html>

  <?php
}
?>
