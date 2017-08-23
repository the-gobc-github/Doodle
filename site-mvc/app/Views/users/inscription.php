<?php
echo "<H1>Pas encore inscrit(e)?</H1>
<br/><br/>
<form class='form-horizontal' method='post' action='?p=users/inscription' class='inscription'>
<fieldset>
<div class='form-group'>
  <label class='control-label' style='margin-left: -10px' for='login'>Choose your login :</label>
   <input type='text' name='login' id='login' size='30' />
</div>
<div class='form-group'>
  <label class='control-label' style='margin-left: 10px' for='email'>Enter your mail :</label>
  <input type='text' name='email' id='email' size='30' />
</div>
<div class='form-group'>
  <label class='control-label' class='control-label' style='margin-left: -20px' for='password'>Choose a password :</label>
   <input type='password'
		  name='password'
		  id='password'
		  size='30' />
</div>
<div class='form-group'>
  <label class='control-label' style='margin-left: -45px' for='password_confirm'>Confirm your password :</label>
   <input type='password'
		  name='password_confirm'
		  id='password_confirm'
		  size='30' />
</div>
<div class='form-group'>
  <label>You will receive confirmation via email as soon as possible.</label><br><br>
   <input class='btn-primary btn' type='submit' value='Valider' class='valider' />
</div>
</fieldset>
</form>";
?>
