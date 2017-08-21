<?php
echo "
      <div class='pull-right' style='margin-top: 20px'>
      <form class='form-inline' method='post' action='?p=users/connexion' class='connexion'>
                <div class='form-group'>
      	        <input class='form-control' type='text' placeholder='Login'
                          name='login'
                          name : 'login '/>
                </div>
                <div class='form-group'>
      	        <input class='form-control' type='password' placeholder='Mot de Passe'
                          name='password'
                          name : 'password'/>
                </div>
                <input class='btn btn-primary' type='submit' name='connexion' value='Sign in'>
                </br></br>
      					<label class='pull-right' style='margin-right: 90px' ><a style='text-decoration:none' href='?p=home&a=change_pwd'>Forgot your password?</a></label>
      </form>
      </div>";
?>

