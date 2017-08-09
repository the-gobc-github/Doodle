<!-- <div class="main_box"> -->
<?php
if (isset($_SESSION['login'])) {
	include('calendar.php');
	unset($_GET);
} else if (!(isset($_GET['a']))) {
	$content = $user_form->form_inscription();
	echo $content;
} else if (isset($_GET['a']))	{
		$a = $_GET['a'];
		$content = '';
		switch ($a) {
			case 'connexion' :
				$content = $user_form->form_connexion();
				break;
			case 'new_user' :
				$content = $user_form->form_inscription();
				break;
			case 'change_pwd' :
				$content = $user_form->form_send_verif();
				break;
			case 'success' :
				$content = $user_form->form_connexion();
				break;
				}
echo $content;
}
?>
<!-- </div> -->
