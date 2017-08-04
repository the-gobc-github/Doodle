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
            /* header('Location: index.php?p=home'); */
        }
        catch(Exception $e)
        {

						echo 'caca';
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
