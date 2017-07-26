
<div class="userbox">
    <div class="galery">

        <?php
        $login = $_SESSION['login'];
        $req = ("SELECT * FROM articles WHERE login='$login' ORDER BY id DESC");
        foreach($db->query($req) as $post):?>

            <div class="galery_block">
                <div class="galery_head">
                <a href="index.php?p=delete&pic=<?= $post->photo?>&id=<?= $post->id ?>">
                    <img id="delete" src="../img/delete.png">
                </a></div>
                <a href="index.php?p=single&id=<?= $post->id; ?>">
                    <img id="image_user" src="<?= $post->photo?>" alt="">
                </a>
            </div>

        <?php endforeach; ?>
    </div>
  </div>

    <div class="settingsbox">
        <a href="index.php?p=administration"><img class="circles" src="../img/modify.png"></a>
    </div>
