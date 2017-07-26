<ul>
<div class="home">
<?php
$counter = $db->query('SELECT * FROM articles');
foreach($db->query('SELECT * FROM articles') as $obj):
  $nbArt++;
endforeach;
$perPage = 5;
$nbPage = ceil($nbArt/$perPage);
if(isset($_GET['e']) && $_GET['e']>0 && $_GET['e']<=$nbPage) {
  $cPage = $_GET['e'];
}
else {
  $cPage = 1;
}
$login = $_SESSION['login'];
$req_limit = "SELECT * FROM articles ORDER BY id DESC LIMIT " .(($cPage-1)*$perPage).",$perPage";
foreach($db->query($req_limit) as $post): ?>
    <div class="photobox">
    <div class="img_block">
        <a href="index.php?p=single&id=<?= $post->id; ?>">
          <img id="image" src="<?= $post->photo?>" alt="">
        </a>
    </div>
        <div class="like_box">
            <a href="index.php?p=like&id=<?= $post->id;?>&log=<?= $_SESSION['login']?>">
                <img id="like" src="../img/<?php
                if (isset($_SESSION['login'])) {
                    $data_like = $db->query('SELECT * FROM like_table WHERE
                    (user_login = :login AND photo_id = :photo_id)',
                        ['login' => $login, 'photo_id' => $post->id])->fetch();
                    if ($data_like['user_login'] == $login) {
                        echo 'like.png';
                    } else if (!($data_like[0])) {
                        echo 'notlike.png';
                    }
                }
                else {
                    echo 'notlike.png';
                }
                ?>">
            </a>
            <div class="nb_like"><?php
                $stat = ("SELECT * FROM `articles` WHERE id='$post->id'");
                foreach ($db->query($stat) as $datas):
                    $nb = $datas->nb_like;
                endforeach;
                if ($nb > 0) {
                    echo $nb;
                }
                ?></div>
        </div>
    <?php $com_req = ("SELECT * FROM comment WHERE photo_id='$post->id' ORDER BY date_creation DESC");
    if ($db->query($com_req) != null) {
    ?>
    <div class="comment_box_home">
        <?php
        foreach($db->query($com_req) as $com):?>
            <div class="commentaire">
                    <div class="talker">De <?= $com->user_login ?> <br>le <?= $com->date_creation?></div>
                    <div class="message"><p class="mess"><?= $com->content ?></p>
                        </div>
                <?php if ($_SESSION['login'] === $com->user_login) {
                    $user_login = $com->user_login;
                    ?>
                    <a href="index.php?p=delete_com&id=<?= $com->com_id?>">
                        <img id="delete_com" src="../img/delete.png">
                    </a>
                    <?php
                }
                ?>
            </div>
        <?php endforeach; ?>

    </div>
    <?php } ?>
    <?php if (isset($_SESSION['login'])) { ?>

    <div class="messenger_home"><center>
            <form id="post_comment"action="?p=comment&id=<?php echo $post->id ?>" method="POST">
                <textarea class="inputcom" rowz = "10" cols = "50" name="comment"></textarea><br>
                <button class="button_send" type="submit" value="Send!"><h2 class="send">SEND</h2></button><br>
            </form></center>
    </div>
    <?php } ?>
    </div>
<?php endforeach; ?>
<div class="main_box"><center><label id="page">
<?php
for($i=1;$i<=$nbPage;$i++) {
  if($i==$cPage) {
      echo "$i - ";
  }
  else {
      echo "<a href='index.php?p=home&e=$i'>$i - </a>";
  }
}

?>
</label></center></div>
<br><br>
</div>

</ul>
