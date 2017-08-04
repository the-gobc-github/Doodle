<?php

namespace App;

class User_function {

    public function get_connexion() {
      $ret = ("<center><form method='post' action='?p=connexion_post' class='connexion'>
          <p>
                <label for='login'>Entrez votre login :</label><br />
      	        <input type='text'
                          name='login'
                          size='30'
                          name : 'login '/>
      					<br /><br />
      	        <label for='password'>Entrez votre Mot de passe :</label><br />
      	        <input type='password'
                          name='password'
                          size='30'
                          name : 'password'/>
      					<br /><br />
                <input type='submit' name='connexion' value='Sign in'>
                <br /><br />
      					<label><a href='?p=reinit'>Forgot your password ?</a></label>
      					<br /><br />
      					<label><a href='?p=inscription'>Sign up</a></label>
          </p>
      </form></center>
      ");
      return $ret;
    }

    public function get_inscription() {
      $ret = ("<center><form method='post' action='?p=inscription_post' class='inscription'>
          <p>
                <label for='login'>Choose your login :</label>
                <br />
      	        <input type='text' name='login' id='login' size='30' />
                <br /><br />
                <label for='email'>Enter your mail :</label>
                <br />
      	        <input type='text' name='email' id='email' size='30' />
                <br /><br />
      	        <label for='password'>Choose a password :</label>
      	        <br />
      	        <input type='password'
                          name='password'
                          id='password'
                          size='30' />
                <br /><br>
                <label for='password_confirm'>Confirm your password :</label><br />
      	        <input type='password'
                          name='password_confirm'
                          id='password_confirm'
                          size='30' />
                <br /><br>
                <label>You will receive confirmation via email as soon as possible.</label><br><br>
      	        <input type='submit' value='Valider' class='valider' />
          </p>
      </form><center>");
      return $ret;
    }


    public function get_admin() {
        $ret = ("<center><form method='post' action='?p=admin'>
          <p>
                <label> Type your old password: </label>
                <br />
                <input type='password' id='pwd' name='pwd'/>
                <br /><br />
                <label> Confirm your old password: </label>
                 <br />
                <input type='password' id='confirm' name='confirm'/>
                <br /> <br />
                <label> Type your new password: </label>
                 <br />
                <input type='password' id='new_pwd' name='new_pwd'/>
                <br /> <br />
                <input type='submit' id='submit' name='submit' value='OK' />
                <br />
         </p>
    </form></center>");
    return $ret;
    }

    public function get_send_reinit() {
        $ret = ("<center><form method='post' action='?p=reinit_post&a=send'>
          <p>
                <label> Type your email adress: </label>
                <br />
                <input type='text' id='new_pwd' name='email'/>
                <br /> <br />
                <input type='submit' id='submit' name='submit' value='OK' />
                <br />
         </p>
    </form></center>");
    return $ret;
    }

    public function get_reinit() {
        $ret = ("<center><form method='post' action='?p=reinit_post&a=open'>
          <p>
                <label> Type your new password: </label>
                 <br />
                <input type='password' id='new_pwd' name='new_pwd'/>
                <br /> <br />
                <label> Confirm your new password: </label>
                 <br />
                <input type='password' id='confirm' name='confirm'/>
                <br /> <br />
                <input type='submit' id='submit' name='submit' value='OK' />
                <br />
         </p>
    </form></center>");
    return $ret;
    }

    public function error_parse($error_num) {

        if($error_num == 1)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Please enter a login!
            </label></center></div>
            ");
        }
        if($error_num == 2)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Please enter a password!
            </label></center></div>
            ");
        }
        if($error_num == 3)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Please confirm your password!
            </label></center></div>
            ");
        }
        if($error_num == 4)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Your password and confirm password fields do not match.
            </label></center></div>
            ");
        }
        if($error_num == 5)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            You must fill all the fields.
            </label></center></div>");
        }
        if($error_num == 6)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Your password and confirm password fields do not match.
            </label></center></div>");
        }
        if($error_num == 7)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Your old password doesn't match.
            </label></center></div>");
        }
        if($error_num == 8)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Wrong login or wrong password.
            </label></center></div>");
        }
        if($error_num == 9)
        {
            $ret = ("<br><br><div class='main_box'><center>
            <label>
            Please confirm your account via mail.
            </label></center></div>");
        }
        return $ret;
    }

}
?>
