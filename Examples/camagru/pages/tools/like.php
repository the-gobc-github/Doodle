<?php

$id = $_GET['id'];
$login = $_GET['log'];
$liked = false;
if(isset($_SESSION['login'])) {

    $req = ("SELECT * FROM like_table WHERE user_login='$login'");
    foreach ($db->query($req) as $post):
        if ($post->photo_id == $id) {
            $liked = true;
        }
    endforeach;


    if ($liked == true) {
        $statement = "DELETE FROM `like_table` WHERE photo_id='$id' AND user_login='$login'";
        $db->simple_query($statement);
        // increment le nb like de photo_id
        $stat = ("SELECT * FROM `articles` WHERE id='$id'");
        foreach ($db->query($stat) as $datas):
            $nb = $datas->nb_like;
        endforeach;
        $nb -= 1;
        $statement = "UPDATE `articles` SET nb_like='$nb' WHERE id='$id'";
        $db->simple_query($statement);
        header("Location: $_SERVER[HTTP_REFERER]");;
    } else if ($liked == false) {
        $statement = "INSERT INTO `like_table` (`id`, `photo_id`, `user_login`) VALUES (NULL, '$id', '$login')";
        $db->simple_query($statement);

        $stat = ("SELECT * FROM `articles` WHERE id='$id'");
        foreach ($db->query($stat) as $datas):
            $nb = $datas->nb_like;
        endforeach;
        $nb += 1;
        $statement = "UPDATE `articles` SET nb_like='$nb' WHERE id='$id'";
        $db->simple_query($statement);
        header("Location: $_SERVER[HTTP_REFERER]");

    }
}
else {
    header('Location: index.php?p=home&c=fail');

}



?>