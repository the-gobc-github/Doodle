<?php
if ($_POST['login'] != NULL && $_POST['password'] != NULL)
{
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $datas = $db->query('SELECT * FROM users WHERE
    (login = :login AND password = :password)',
    ['login' => $login, 'password' => $password])->fetch();
    if ($datas[0])
    {
            if($datas[5] == 1){
                session_start();
                $_SESSION['login'] = $_POST['login'];
                header('Location: index.php?p=user');
            }
            else {
                header('Location: index.php?p=connexion&c=fail&err=9');
            }

    }
    else {
        header('Location: index.php?p=connexion&c=fail&err=8');
    }
  }
?>
