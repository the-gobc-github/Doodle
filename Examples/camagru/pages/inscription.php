<div class="main_box">
<?php
$content = $user_connect->get_inscription();
echo $content;
?>
</div>
<?php
$error = $user_connect->error_parse($_GET['err']);
echo $error;
?>