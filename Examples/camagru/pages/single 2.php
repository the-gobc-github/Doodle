<ul>
<div class="galery">
        <?php
        $id = $_GET['id'];
        $statement = ("SELECT * FROM articles WHERE id='$id'");
        foreach($db->query($statement) as $post): $path = $post->photo; $log = $post->login;?>

            <div class="single_block">
                    <img id="single_image" src="<?= $post->photo?>" alt="">
            </div>

        <?php endforeach; ?>
        <div class="comment_box">
            <?php
            $com_req = ("SELECT * FROM comment WHERE photo_id='$id' ORDER BY date_creation DESC");
            foreach($db->query($com_req) as $com):?>
            <div class="commentaire">
                <ul>
                    <h4 class="talker"><center>De <?= $com->user_login ?> le <?= $com->date_creation?></center></h4>

                    <div class="message"><p class="mess">"<?= $com->content ?>"</p>
                        <?php if ($_SESSION['login'] === $com->user_login) {
                        $user_login = $com->user_login;
                            ?>
                        <a href="index.php?p=delete_com&id=<?= $com->com_id?>">
                            <img id="delete_com" src="../img/delete.png">
                        </a>
                            <?php
                        }
                        ?></div>

                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    <?php if (isset($_SESSION['login'])) { ?>

    <div class="messenger"><center>
        <form id="post_comment"action="?p=comment&id=<?php echo $id ?>" method="POST">
           <textarea class="inputcom" rowz = "10" cols = "50" name="comment"></textarea><br>
            <button class="button_send" type="submit" value="Send!"><h2 class="send">SEND</h2></button><br>
        </form></center>
    </div>
    <?php } ?>
</div>
</ul><br>
<ul>
    <?php
    if ($_SESSION['login'] === $log)
    {
        ?>
        <div class="effect_box">
            <div class="effecter">
                <a href="index.php?p=effect&pic=<?php echo $path?>&e=contrast&a=more&id=<?php echo $id;?>">
                    <img class="adder" src="../img/plus.png">
                </a>
            <img class="effecticon" src="../img/contrast.png">
                <a href="index.php?p=effect&pic=<?php echo $path?>&e=contrast&a=less&id=<?php echo $id;?>">
                    <img class="adder" src="../img/minus.png">
                </a>
            </div>

            <div class="effecter">
                <a href="index.php?p=effect&pic=<?php echo $path?>&e=bright&a=more&id=<?php echo $id;?>">
                    <img class="adder" src="../img/plus.png">
                </a>
                <img class="effecticon" src="../img/sun.png">
                <a href="index.php?p=effect&pic=<?php echo $path?>&e=bright&a=less&id=<?php echo $id;?>">
                    <img class="adder" src="../img/minus.png">
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
        <?php
    }
    ?>
</ul>
