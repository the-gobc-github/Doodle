<?php
session_start();
header('Content-Type: text/css');
if (isset($_SESSION['login'])) {
  $user = "white";
  $webcam = "";
  $comment = "280px";
}
else if (!isset($_SESSION['login'])) {
  $user = "white";
  $webcam = "display: none;";
  $comment = "370px";
}



?>

:hover {
    transition:all 0.5s ease;

}

.menubar {
    height: 100px;
    width: 100vw;
    background-color: <?php echo $user;?>;
    margin: -10px;
    position: fixed;
    top: 0;
    z-index: 10;


}

label {
    font-size: 13px;
    font-family: Futura;
    text-decoration: none;
}

.footer {
    height: 50px;
    width: 100vw;
    background-color: rgb(0, 0, 0);
    position: fixed;
    bottom: 0;
    margin: -9px;
    box-shadow: inset 0px 10px 50px rgb(42, 41, 41);
}

#logo {
    margin-top: -13px;
    margin-left: 10px;
    padding: 10px;
    height: 120px;
    width: 190px;
}

#user_logo {
    float: right;
    height: 70px;
    margin-top: 20px;
    margin-right: 10px;
}

#user_logo:hover {
    transform: scale(1.1, 1.1);
}

#photo_logo {
<?php echo $webcam;?> float: right;
    height: 70px;
    margin-top: 20px;
    margin-right: 10px;

}

#photo_logo:hover {
    transform: scale(1.1, 1.1);
}

.circles {
    height: 100px;
    width: 100px;
    padding: 5px;
}


.circles:hover {
    transform: scale(1.1,1.1);
}



.userbox {
    width: 79vw;
    display: block;
}

.settingsbox {
    position: fixed;
    width: 100px;
    right: 0;
    margin-right: 50px;
}


.galery {
    display: block;
}

.galery_block {
    position: relative;
    padding: 15px;
    float: left;
}

.galery_head {
    height:40px;
    background-color: #000000;
}

#image {
    height: 400px;
    width: 535px;

}

#image_user {
    height: 200px;
}

#image_user:hover {

}

#image:hover {

}

#single_image {
     height: 350px;
    border-radius: 300px;

}

#single_image:hover {
    border-radius: 0px;


}

#videoElement {
    height: 300px;
    width: 500px;
}

.single_block {
float: left;
padding:0px;
}

.comment_box {
    overflow:auto;
    height:<?php echo $comment;?>;
/*    border: 8px solid */<?php //echo $user;?>/*;*/
    width: 390px;
    margin-left: 500px;
    display: block;

}

.main_box {
    margin: 0 auto;
    width: 380px;
    border: 8px solid <?php echo $user;?>;
    background-color: <?php echo $user;?>;
}

#wrong {
    align-self: center;

    height: 100px;
    width: 100px;

}

.webcambox {
    display: block;
}

video {
    height: 350px;
}

.videobox {
    float: left;
    margin-left: 20px;
    transform: scaleX(-1);
}

.butt {
    margin-top: 110px;
    float: left;
}

#startbutton {
    padding: 20px;
    height:200px;
}

#canvas {
    float: left;
    margin-left: 20px;
    height: 350px;
    transform: scaleX(-1);

}

#delete {
    padding: 5px;
    position: absolute;
    height:30px;
}

.effect_box {
    margin-top: -4px;
    margin-left: auto;
    margin-right: auto;
    background-color: #f3f3f3;
    height: 70px;
}

.effecter {
    margin-top: 10px;
    padding: 7px;
    float: left;
}

.content_effect {
    margin-left: 24px;
}

.icon_effect {
    height:36px;
}

.icon_effect:hover {
    transform: scale(1.1);
}

.colorize {
    padding: 3px;
    height: 27px;
}

.colorize:hover {
    transform: scale(1.1);

}

.messenger {
    margin-left: 500px;
    width: 390px;
    height: 110px;
    border: 5px solid <?php echo $user;?>;
    border-radius: 35px;
    background-color: #dee0e2;


}

#post_comment {
    margin-top: 15px;
}

.mess {
    padding:10px;
    font-family:"Helvetica Neue";
    font-weight: bold;


}

.message {
    margin-left: auto;
    margin-right: auto;
    float: left;
    max-width: 535px;

}

.message:hover {
    color: white;


}

.commentaire {
    float: left;
    background-color: #ffffff;
    width: 535px;
}

.commentaire:hover {
    background-color: #000000;
    color: white;
}

.talker {
    padding:17px;
    float: left;
    font-family:"Helvetica Neue";
    font-size: 15px;

}

.button_send {
    margin-top: 5px;
    color: #fff;
    background-color: #000000;
    border: none;
    box-shadow: 0 5px #383838;
    width: 60px;
    height:30px;
}

.button_send:hover {
    background-color: #ff2a37
    color: #000000;


}

.button_send:active {
    background-color: #417cb8;
    box-shadow: 0 10px #27496d;
    transform: translateY(5px);
}

#delete_com {
    height:20px;
    float: right;
    padding:10px;
    margin-top: 15px;
    margin-right: 10px;
}

.inputcom {
    margin-top: 15px;
    width:330px;
    height:30px;
    border:1px solid #417cb8;
    border-left: 4px solid #000000;
}

.send {
    margin-top: 4px;
    font-family:Futura;
}

.photobox {
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px;
    width: 535px;
}

.img_block {
    text-align: center;
}

.comment_box_home {
    overflow:auto;
    margin-left: auto;
    margin-right: auto;
    margin-top: -4px;
    max-height: 200px;
    background-color: #ffffff;

}

.messenger_home {
    height: 110px;
    background-color: #ffffff;
    margin-left: auto;
    margin-right: auto;
    margin-top: -18px;
    width: auto;

}

body {
    background-color: #e6e3e1;
}

.like_box {
    display: block;
    margin-top: -4px;
    height: 50px;
    background-color: #ffffff;
}

#like {
    float: left;
    margin-left: 5px;
    padding: 7px;
    height:30px;
}

.nb_like {
    float: left;
    margin-top: 2px;
    padding: 5px;
    font-family:"Helvetica Neue";
    font-size: 25px;
    font-weight: bold;
}

.stick {
    position: absolute;
    height: 130px;
    width: 800px;
    background-color: #ffffff;
    margin-top: 380px;
    margin-left: 50px;
}

.radio {
    margin-left: 30px;
}

#page {
  font-size: 15px;
  font-weight: bold;
}
