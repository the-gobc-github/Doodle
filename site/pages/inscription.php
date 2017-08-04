<div class="main_box">
<?php
$content = $user_form->form_inscription();
echo $content;
?>
</div>
<?php
$error = $user_form->error_parse($_GET['err']);
echo $error;
?>
