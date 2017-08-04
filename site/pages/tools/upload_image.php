<?php
header("Content-Type: image/png");
$login = $_SESSION['login'];

$path = '../img/upload/';

if (!is_dir($path))
    mkdir($path, 0777, true);

function base64_to_png($base64, $output_file, $path)
{
    $decoded = base64_decode($base64);
    file_put_contents($path.$output_file, $decoded);
    return( "./img/upload/".$output_file);
}

if (isset($_POST['data']))
{
    $dataURL = htmlentities($_POST['data'], ENT_QUOTES);
    $dataURL = str_replace(" ", "+", $dataURL);
    $parts = explode(',', $dataURL);
    $img = $parts[1];
    $name_img = $login.".".md5(microtime(TRUE) * 100000).".png";
    $image = base64_to_png($img, $name_img, $path);

    $reponse = imagepng($image, '../img/upload/');
    print $reponse;
}

//$requete = "
//	INSERT INTO articles (login, is_public, img)
//	VALUES ('$login', '0', '$image');";
//$pdo->prepare($requete)->execute();