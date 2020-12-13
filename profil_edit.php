<?php
session_start();
include 'database.php';
global $connect;
$username = $_SESSION['userID'];
?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Edition</title>
  </head>
  <body>
    <?php include 'menu_nav.php'; ?>
    <h2>Editer le profil</h2>

    <div class="InscriptionAndLogin">
      <form method="post">
        <table>
          <tr>
            <td>
              <label for="lName"> Nom : </label>
            </td>
            <td>
              <input type="text" name="lName" id="lName" placeholder="Votre nom" required><br/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="lName"> Prénom : </label>
            </td>
            <td>
              <input type="text" name="fName" id="fName" placeholder="Votre prénom" required><br/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="Password"> Mot de passe  : </label>
            </td>
            <td>
              <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
            </td>
          </tr>
        </table><br/>
        <input type="submit" name="sendEdition" id="sendEdition" value="Valider">
      </form>
    </div>

    <?php
    if(isset($_POST['sendEdition'])) {
      $fName = htmlspecialchars($_POST['fName']);
      $lName = htmlspecialchars($_POST['lName']);
      $hash_password = sha1($_POST['password']); //sha1 chiffrage
      $updatelName = $connect->query("UPDATE user SET lName = '$lName' where userID = '$username' ");
      $updatefName = $connect->query("UPDATE user SET fName = '$fName' where userID =  '$username' ");
      $updatePassword = $connect->query("UPDATE user SET password = '$hash_password' where userID =  '$username' ");
      echo "Profil Editer";
    }
    ?>

  </body>
</html>
