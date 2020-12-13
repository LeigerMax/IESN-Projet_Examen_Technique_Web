<?php
include 'database.php';
global $connect;
?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Inscription</title>
  </head>

  <body>
    <?php include 'menu_nav.php'; ?>

    <div class="InscriptionAndLogin">
      <h2>Inscription à MyExam</h2><br/>
      <form method="post">
        <table>
          <tr>
            <td>
              <label for="username"> Username : </label>
            </td>
            <td>
              <input type="text" name="username" id="username" placeholder="Votre username" required><br/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="email"> Email : </label>
            </td>
            <td>
              <input type="email" name="email" id="email" placeholder="Votre email" required><br/>
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
        <input type="submit" name="sendInscription" id="sendInscription" value="Inscription">
      </form>
    </div>

    <?php
    if(isset($_POST['sendInscription'])) {
      $username = htmlspecialchars($_POST['username']);
      $email = htmlspecialchars($_POST['email']);
      $hash_password = sha1($_POST['password']); //sha1 chiffrage

      $usernamelength = strlen($username);
      if($usernamelength <= 255) { #Vérifier que le pseudo ne dépasser pas les 255 caractères
        $verifEmailAndUsername = $connect-> prepare("SELECT * FROM user WHERE email = ? AND username = ?");
        $verifEmailAndUsername->execute(array($email,$username));
        $existEmailOrUsername = $verifEmailAndUsername->rowCount(); //permet de compter le nombre de résultat
        if($existEmailOrUsername == 0) {
          $insertUser = $connect -> prepare("INSERT INTO user(username,email,password) VALUES (?,?,?)");
          $insertUser->execute(array($username, $email, $hash_password));
          echo "Compte créer";
        }
        else "Username ou Email existant";
      }
      else {
        echo "L'username ne doit pas dépasser 255 caractères";
      }
    }
    ?>

  </body>
</html>
