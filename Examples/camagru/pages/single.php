<?php  $id = $_GET['id'];
?>
<ul>
    <div class="home">

        <?php
        $statement = ("SELECT * FROM articles WHERE id='$id'");

        foreach($db->query($statement) as $post): $path = $post->photo; $log = $post->login; ?>
            <div class="photobox">
                <div class="img_block">
                        <img id="image" src="<?= $post->photo?>" alt="">
                </div>

                <?php
                if ($_SESSION['login'] === $log)
                {
                    ?>

                    <div class="effect_box">
                        <div class="content_effect">
                        <div class="effecter">
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=contrast&a=more&id=<?php echo $id;?>">
                                <img class="icon_effect" src="../img/plus.png">
                            </a>
                            <img class="icon_effect" src="../img/contrast.png">
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=contrast&a=less&id=<?php echo $id;?>">
                                <img class="icon_effect" src="../img/minus.png">
                            </a>
                        </div>

                        <div class="effecter">
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=bright&a=more&id=<?php echo $id;?>">
                                <img class="icon_effect" src="../img/plus.png">
                            </a>
                            <img class="icon_effect" src="../img/sun.png">
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=bright&a=less&id=<?php echo $id;?>">
                                <img class="icon_effect" src="../img/minus.png">
                            </a>
                        </div>
                        <div class="effecter">
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=blur&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/blur.png"></a>
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=nega&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/nega.svg"></a>
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=gray&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/gray.png"></a>
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=red&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/red.png"></a>
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=yellow&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/yellow.png"></a>
                            <a href="index.php?p=effect&pic=<?php echo $path?>&e=blue&id=<?php echo $id;?>">
                                <img class="colorize" src="../img/blue.png"></a>
                        </div>
                            </div>


                    </div>
                    <?php
                }
                ?>
                    <div class="like_box">
                        <a href="index.php?p=like&id=<?= $id;?>&log=<?= $log ?>">
                            <img id="like" src="../img/<?php
                            if (isset($_SESSION['login'])) {
                                $data_like = $db->query('SELECT * FROM like_table WHERE
                    (user_login = :login AND photo_id = :photo_id)',
                                    ['login' => $log, 'photo_id' => $id])->fetch();
                                if ($data_like['user_login'] == $log) {
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

                <?php $com_req = ("SELECT * FROM comment WHERE photo_id='$id' ORDER BY date_creation DESC");
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
                            <form id="post_comment"action="?p=comment&id=<?php echo $id ?>" method="POST">
                                <textarea class="inputcom" rowz = "10" cols = "50" name="comment"></textarea><br>
                                <button class="button_send" type="submit" value="Send!"><h2 class="send">SEND</h2></button><br>
                            </form></center>
                    </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>


    </div>
</ul>
