<?php
session_start();
include 'database.php';
global $connect;
$username = $_SESSION['userID'];

if(isset($_GET['userID']) AND ($_GET['userID'] > 0)) {
  $getUserID = intval($_GET['userID']);
  $queryuser = $connect->prepare("SELECT * FROM user WHERE userID = ?");
  $queryuser->execute(array($getUserID));
  $userinfo = $queryuser->fetch();

  ?>

  <html lang="fr" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="assets/css/styles.css">
      <title>Profil</title>
    </head>
    <body>
      <?php include 'menu_nav.php'; ?>

      <div class="profil">
        <div class="profilDonne">
          <h2>Profil de <?php echo $userinfo['username']; ?></h2>
          <img class="photoprofil" src="assets/img/etu.png" alt="photo profil" width="120" height="120">
          <p>Mail : <?php echo $userinfo['email']; ?></p>
          <p>Nom : <?php echo $userinfo['lName']; ?></p>
          <p>Prénom : <?php echo $userinfo['fName']; ?></p>
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
                    <th>Titre</th>
                    <th>Durée</th>
                    <th>Status</th>
                    <th>Résultat</th>
                    <th>Sélectionner</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($affichageDesExamens = $menuExamProfil->fetch())
                  {
                    if ($affichageDesExamens["userID"] == $_SESSION['userID']) {?>
                      <tr>
                        <?php
                        echo "<td> $affichageDesExamens[examThemeTitle] </td>";
                        echo "<td> $affichageDesExamens[examThemeTime] </td>";
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
                        $menuExamSelect = $connect->query('SELECT * FROM examProfil INNER JOIN examTheme ON examProfil.examThemeID = examTheme.examThemeID '); //WHERE status = 0 OR status = 2
                        while ($examSelect = $menuExamSelect->fetch()) {
                          if ($examSelect["userID"] == $_SESSION['userID']) {
                            if ($affichageDesExamens["examProfilID"] == $examSelect["examProfilID"]) {?>
                              <td><input type="radio" name="examProfilIDChoix" value="<?php echo $examSelect["examProfilID"]; ?>"></td>
                              <?php
                            }
                          }
                        }
                        $menuExamSelect->closeCursor();
                        ?>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
              <?php
              $menuExamProfil->closeCursor();
              ?>
              <input type="submit" name="Lancer" value="Lancer">
            </form>


            <?php
            $menuExamSelect2 = $connect->query("SELECT * FROM examProfil where userID = '$username'");
            if(isset($_POST['Lancer'])){
              if(!empty($_POST['examProfilIDChoix'])) {
                $_SESSION['examProfilID'] = $_POST['examProfilIDChoix'];
                $examProfilIDChoix = $_POST['examProfilIDChoix'];
                while ($examSelect2 = $menuExamSelect2->fetch()) {
                  if ($examSelect2['examProfilID'] ==  $examProfilIDChoix){
                    if ($examSelect2['examProfilStatus'] == 0 OR $examSelect2['examProfilStatus'] == 2 ) {
                      $_SESSION['examThemeID'] = $examSelect2['examThemeID'];
                      $connect->query("UPDATE examProfil SET examProfilStatus = 2 where examProfilID = '$examProfilIDChoix'");
                      header("Location: start_exam_etu.php");
                    }
                    else {
                      $_SESSION['choixIdExam'] = $examSelect2['examThemeID'];
                      header("Location: resultat.php");
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
