<div class="main_box">
<?php
if (isset($_SESSION['login'])) {
    /* header('Location: index.php?p=user'); */

		$content = $user_form->form_connexion();
    echo $content;
} else {
    $content = $user_form->form_connexion();
    echo $content;
}
?>
</div>
<?php
$error = $user_form->error_parse($_GET['err']);
echo $error;
?>

