<?php
session_start();
include 'database.php';
global $connect;
$examProfilID = $_SESSION['examProfilID'];
$examThemeID = $_SESSION['examThemeID'];

$titreExamenATrouver = $connect->query("SELECT * FROM examProfil INNER JOIN examTheme ON examProfil.examThemeID = examTheme.examThemeID where examProfilID = '$examProfilID'");
while ($donne = $titreExamenATrouver->fetch()) {
  $examThemeTitle = $donne['examThemeTitle'];
  $examThemeID = $donne['examThemeID'];
}
$titreExamenATrouver->closeCursor();

?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Examen</title>
  </head>
  <body>
    <?php include 'menu_nav.php'; ?>
    <div class="resultat">
      <h2>Examen de <?php echo $examThemeTitle;?></h2>
      <?php
      $GenerationQuestion = $connect->query("SELECT * FROM question where examThemeID = '$examThemeID'");
      $countquest =1;
      while ($questionAffichage = $GenerationQuestion->fetch()) {
        echo "</br>";
        echo "<p class='questionCss'> $countquest $questionAffichage[questTxt] </p>";
        $countquest +=1;
        $examInProgress = $connect->query("SELECT * FROM examInProgress where examProfilID = '$examProfilID' and questID = '$questionAffichage[questID]' ");
        $tableauAnswer = $connect->query("SELECT * FROM answer  where questID = '$questionAffichage[questID]'");
        $tableauAnswerCorrect = $connect->query("SELECT * FROM answer where questID = '$questionAffichage[questID]' ");
        while ($donne2 = $examInProgress->fetch()) {
          while ($donne3 = $tableauAnswer->fetch()) {
            if($donne3['ansID'] == $donne2['ansID']){
              echo " <p class='AnswerCss'> Votre réponse : $donne3[ansTxt] </p> ";
              echo " <p class='AnswerCss'> Point : $donne2[examInProgressResult] </p> ";
              if($donne3['isCorrect'] == 0 or $donne3['isCorrect'] == 2 and $questionAffichage['questID'] == $donne3['questID']){
                while ($donne4 = $tableauAnswerCorrect->fetch()) {
                  if($donne4['isCorrect'] == 1 and $questionAffichage['questID'] == $donne4['questID'] ){
                    echo " <p class='isCorrectCss'>La bonne réponse était : $donne4[ansTxt] </p>";
                  }
                }
                $tableauAnswerCorrect->closeCursor();
              }
            }
          }
          $tableauAnswer->closeCursor();
        }
      }
      $GenerationQuestion->closeCursor();
      $examInProgress->closeCursor();
      ?>
    </div>
  </body>
</html>
