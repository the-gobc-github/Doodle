<div class="main_box">
<?php
$content = $user_connect->form_inscription();
echo $content;
?>
</div>
<?php
$error = $user_connect->error_parse($_GET['err']);
echo $error;
?>
