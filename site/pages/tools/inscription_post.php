<?php
    if($_POST['login'] != NULL AND $_POST['password'] != NULL AND $_POST['password_confirm'] != NULL  AND  $_POST['password'] == $_POST['password_confirm'])
    {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $cle = md5(microtime(TRUE)*100000);
        $valid = 0;
        try {
            $res = $db->query('INSERT INTO users (login, cle, email, password, valid) VALUES(:login, :cle, :email, :password, :valid)', array(
                ':login' => $login,
                ':password' => $password,
                ':email' => $email,
                ':cle' => $cle,
                ':valid' => $valid));
            $to = $email;
            $subject = "Inscription Camagru";

            $message = "<html><head></head><body><ul>Bienvenue sur Camagru!</ul>
            <ul>Veuillez cliquer sur le lien ci-dessous pour activer votre compte!</ul>
            <ul>http://localhost:8080/camagru/public/index.php?p=validation&log=$login&cle=$cle</ul>
            </body></html>";

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            mail($to, $subject, $message, $headers);
            header('Location: index.php?p=home&c=success');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    if($_POST['login'] == NULL)
    {
        header('Location: index.php?p=inscription&c=fail&err=1');
    }
    if($_POST['password'] == NULL)
    {
        header('Location: index.php?p=inscription&c=fail&err=2');
    }
    if($_POST['password_confirm'] == NULL)
    {
        header('Location: index.php?p=inscription&c=fail&err=3');
    }
    if($_POST['password'] != $_POST['password_confirm'])
    {
        header('Location: index.php?p=inscription&c=fail&err=4');
    }
?>
