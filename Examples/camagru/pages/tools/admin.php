<?php
session_start();

$pwd = htmlspecialchars($_POST["pwd"]);
$confirm = htmlspecialchars($_POST["confirm"]);
$new_pwd = htmlspecialchars($_POST["new_pwd"]);
$submit = htmlspecialchars($_POST["submit"]);

if (empty($pwd) || empty($confirm) || empty($new_pwd) || isset($submit) != "OK") {
    header('Location: index.php?p=administration&c=fail&err=5');
}
else {
    $pwd = $_POST['pwd'];
    $confirm = $_POST['confirm'];
    $new = $_POST['new_pwd'];
    $login = $_SESSION['login'];
    if ($pwd === $confirm && $pwd != $new) {
        $statement = ("SELECT * FROM users WHERE login='$login'");
        $res = $db->query($statement);
        $check_mdp = $pwd;
        if ($check_mdp == $pwd) {
            $status = ("UPDATE users SET `password`='$new' WHERE login='$login'");
            $db->simple_query($status);
            header('Location: index.php?p=user&c=success');

        }
        else {
            header('Location: index.php?p=administration&c=fail&err=7');
        }
    }
    else
        header('Location: index.php?p=administration&c=fail&err=6');
}
?>