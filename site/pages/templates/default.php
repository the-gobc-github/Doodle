<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../public/css/style.css?v=<?=time();?>" rel="stylesheet"/>
  </head>
  <body>
        <div class="menubar">
			<a href="index.php?p=home"><img id="logo" src="../img/logo.png"></a>
			<a href="index.php?p=preferences"><img id="logo_prefs" src="../img/logo_prefs.png"></a>


        </div><br><br><br><br><br><br>
    <div class="container">
        <?= $content; ?>
    </div>
    <div class ="footer">

    </div>
  </body>
</html>
