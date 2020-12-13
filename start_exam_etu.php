<?php
session_start();
include 'database.php';
global $connect;
$examProfilID = $_SESSION['examProfilID'];
$choixIdExam = $_SESSION['examThemeID'];
$username = $_SESSION['userID'];
$examThemeTitleATrouver = $connect->query("SELECT * FROM examTheme where examThemeID ='$choixIdExam' ");
while ($trouvernom = $examThemeTitleATrouver->fetch()) {
  $examThemeTitle = $trouvernom['examThemeTitle'];
}
$examThemeTitleATrouver->closeCursor();
?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Examen</title>
  </head>
  <body>
    <h2>Examen de <?php echo $examThemeTitle;?></h2>
    <?php
    $countquest = 1;
    $GenerationQuestion = $connect->query("SELECT * FROM question WHERE examThemeID = '$choixIdExam'");
    ?>
    <div class="startExam">
      <form action="" method="post">
        <?php
        while ($questionAffichage = $GenerationQuestion->fetch()) {
          echo "</br>";
          echo "<p class='questionCss'> $countquest $questionAffichage[questTxt] </p>";
          $countquest +=1;
          $GenerationAnswer = $connect->query('SELECT * FROM answer');
          while ($answerAffichage = $GenerationAnswer->fetch()) {
            if($questionAffichage['questID'] == $answerAffichage['questID']){
              echo "<INPUT TYPE='radio' NAME= '$answerAffichage[questID]' VALUE='$answerAffichage[ansID]' >";
              echo " $answerAffichage[ansTxt] </br> ";
            }
          }
        }
        $GenerationQuestion->closeCursor();
        $GenerationAnswer->closeCursor();
        ?>
        <br/>
        <input type="submit" name="valider" value="valider">
      </form>


      <?php
      $questionAffichage2 = $connect->query("SELECT * FROM question where examThemeID = '$choixIdExam'");
      $resultatquest = 0;
      $resultatTotal = 0;
      while ($reponseChoisi = $questionAffichage2->fetch()) {
        if (isset($_POST[$reponseChoisi['questID']])){
          $numAns = $_POST[$reponseChoisi['questID']]; //Num Réponse
          $numQuest = $reponseChoisi['questID']; //Num Question
          $GenerationAnswer2 = $connect->query('SELECT * FROM answer');
          while ($querytest = $GenerationAnswer2->fetch()) {
            if($numAns == $querytest['ansID']){
              if(0 == $querytest['isCorrect']){
                $resultatquest = -0.5;
              }
              elseif(1 == $querytest['isCorrect']){
                $resultatquest = 1;
              }
              elseif(2 == $querytest['isCorrect']){
                $resultatquest = 0;
              }
              $resultatTotal += $resultatquest;
            }
          }
          $enregistrerReponse = $connect->prepare("INSERT INTO examInProgress(examProfilID,questID,ansID,examInProgressResult) VALUES (?,?,?,?)");
          $enregistrerReponse->execute(array($examProfilID, $numQuest, $numAns,$resultatquest));
          $resultatquest = 0;
        }
      }
      $questionAffichage2->closeCursor();
      $GenerationAnswer2->closeCursor();
      if(isset($_POST['valider'])){
        $changerStatus = $connect->query("UPDATE examProfil SET examProfilStatus = 1  where examProfilID = '$examProfilID' and userID = '$username' ");
        $changerStatus = $connect->query("UPDATE examProfil SET examProfilResult = '$resultatTotal' where examProfilID = '$examProfilID' and userID = '$username'");
        header("Location: resultat.php");
      }
      ?>
    </div>
  </body>
</html>
