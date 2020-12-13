<?php
session_start();
include 'database.php';
global $connect;

if(isset($_POST['sendAddQuiz'])) { //Créer un exam
  $examThemeTitle = htmlspecialchars($_POST['examThemeTitle']);
  $examThemeTime = htmlspecialchars($_POST['examThemeTime']);
  $inserNewExam = $connect -> prepare("INSERT INTO examTheme(examThemeTitle,examThemeTime) VALUES (?,?)");
  $inserNewExam->execute(array($examThemeTitle, $examThemeTime));
  echo "exam theme créer";
}
?>
<div class="connexion">
  <h2>Ajouter un examen</h2>
  <br/>
  <form method="post">
    <table>
      <tr>
        <td>
          <label for="examThemeTitle"> Nom de l'examen à ajouter : </label>
        </td>
        <td>
          <input type="text" name="examThemeTitle" id="examThemeTitle" placeholder="Nom de l'exam à ajouter " required><br/>
        </td>
      </tr>
      <tr>
        <td>
          <label for="examThemeTime"> Durée de l'exam en minute : </label>
        </td>
        <td>
          <input type="text" name="examThemeTime" id="examThemeTime" placeholder="Durée de l'exam en minute " required><br/>
        </td>
      </tr>
    </table>
    <br/>
    <input type="submit" name="sendAddQuiz" id="sendAddQuiz">
  </form>
</div>
