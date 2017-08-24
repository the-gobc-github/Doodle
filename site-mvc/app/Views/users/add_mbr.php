<?php
echo "<form class='form-horizontal' method='post' action='?p=users/add_mbr' class='search'>
	<fieldset>
	<div class='form-group'>
		<label class='control-label' for=add-friend>Ajoutez un ami à votre groupe :</label>
		<input type='text' name='add-friend' id='add-friend' size='30' />
	</div>
	<div class='form-group'>
		<label class='control-label' for=group-name>Dans quel groupe ?:</label>
		<input type='text' name='group-name' id='group-name' size='30' />
	</div>
	<div class='form-group'>
	<input class='btn-primary btn' type='submit' value='Valider' class='valider' />
	</div>
	</fieldset>
	</form>";
?>
