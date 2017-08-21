<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link href="../public/css/style.css?v=<?=time();?>" rel="stylesheet"/>
</head>
  <body>
        <nav class="navbar navbar-default">
              <a href="index.php?p=home"><img id="logo" src="../img/logo.png"></a>
              <a href="index.php?p=preferences"><img id="logo_prefs" src="../img/logo_prefs.png"></a>
        <?php
          if ($_SESSION['login'] === NULL)
          {
            /* $connection = $user_form->form_connexion(); */
            /* echo $connection; */
			echo $content;
          }
        ?>
      </nav>
      <div class="container text-center">
        </nav><br><br>
        <?= $content; ?>
      </div>
    <div class ="footer">

    </div>
  </body>
  <!-- <script src="../app/js/calendar.js"></script> -->

</html>
