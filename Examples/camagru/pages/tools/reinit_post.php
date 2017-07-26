<?php

if($_GET['a'] == send)
{
    $email = $_POST['email'];
    $datas = $db->query('SELECT * FROM users WHERE
    (email = :email)',
    ['email' => $email])->fetch();
    $login = $datas[1];
    $new = md5(microtime(TRUE)*100000);
    $status = ("UPDATE users SET `cle`='$new' WHERE login='$login'");
    $db->simple_query($status);
    $to = $email;
    $subject = "Reinitialisation du mot de passe";
    $message = "<html><head></head><body><ul>Bienvenue sur Camagru!</ul>
    <ul>Veuillez cliquer sur le lien ci-dessous pour reinitialiser votre mot de passe!</ul>
    <ul>http://localhost:8080/camagru/public/index.php?p=reinit_post&a=open&cle=$new</ul>
    </body></html>";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    mail($to, $subject, $message, $headers);
    header('Location: index.php?p=connexion&c=success');
}
if($_GET['a'] == open) {
      if(isset($_GET['log'])) {
        $login = $_GET['log'];
        $req = "SELECT * FROM users WHERE login='$login'";
        $datas = $db->query($req);
        $cle = $datas[0]->cle;
        if($cle == $_GET['cle'])

        }
        else
            echo "caca";
}
else {
  echo "crotte";
}
?>
