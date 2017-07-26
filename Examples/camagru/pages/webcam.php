<div class="webcambox">
<div class="videobox">
    <video id="video"></video></br>
</div>
<!--    <div class="butt">-->
<!--    <img id="startbutton" src="../img/snapshot.png">-->
<!--    </div>-->
<div class="canvas box">
        <canvas id="canvas"></canvas>
</div>
</div>

<div class="stick">
    <form name="choix" class="radioform" method="post">
        <p>
            <input class="radio" type="radio" name="rad" value="1" ><img src="../img/stickers/tumb1.png">
            <input class="radio" type="radio" name="rad" value="2"/><img src="../img/stickers/tumb2.png">
            <input class="radio" type="radio" name="rad" value="3"/><img src="../img/stickers/tumb3.png">
            <input class="radio" type="radio" name="rad" value="4"/><img src="../img/stickers/tumb4.png">
            <input class="radio" type="radio" name="rad" value="5"/><img src="../img/stickers/tumb5.png">
            <input class="radio" type="radio" name="rad" value="6" checked/><img src="../img/stickers/none.png">
            <input id="startbutton" type="submit" name="submit" value="Submit" />
        </p>
    </form>
</div>

<div>
    <form method="post" action="reception.php" enctype="multipart/form-data">
        <input type="file" name="mon_fichier" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
    </form>
</div>
<script src="../public/js/script.js">
</script>
