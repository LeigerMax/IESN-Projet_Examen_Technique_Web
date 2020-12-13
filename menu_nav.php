<?php
session_start();
$userSelect = $_SESSION['userID'];
?>
<div class="header">
  <h1>MyExam</h1>
  <nav>
    <ul>
      <?php
      if(isset($_SESSION['userID']) AND $userinfo['userID'] == $_SESSION['userID']) { #Permet d'afficher des données seulement quand l'ID est connecté
        ?>
        <li>
          <?php
          if ($_SESSION['userStatus'] == 'etu') {
            echo '<a href="profil_etu.php?userID='.$userSelect.'">Profil</a>';
          }
          else {
            echo '<a href="profil_prof.php?userID='.$userSelect.'">Profil</a>';
          }
          ?>
        </li>
        <li>
          <a href="deconnexion.php">Se déconnecter</a>
        </li>
        <?php
      }
      else { ?>
        <li>
          <a href="index.php">Accueil</a>
        </li>
        <li>
          <a href="inscription.php">Inscription</a>
        </li>
        <li>
          <a href="connexion.php">Connexion</a>
        </li>
        <?php
      }
      ?>
    </ul>
  </nav>
</div>
