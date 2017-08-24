<?php

namespace App;

class Form {

    public function form_connexion() {
      $ret = ("
      <div class='pull-right' style='margin-top: 20px'>
      <form class='form-inline' method='post' action='?p=backform&a=connexion' id='connexion'>
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
      </div>
      ");
      return $ret;
    }

    public function form_inscription() {
      $ret = ("
              <H1>Pas encore inscrit(e)?</H1>
              <br/><br/>
              <form class='form-horizontal' method='post' action='?p=backform&a=inscription' class='inscription'>
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
              </form>");

      return $ret;
    }


    /* public function form_update_pwd() { */
    /*     $ret = ("<center><form method='post' action='?p=backform&a=update_pwd'> */
    /*       <p> */
    /*             <label> Type your old password: </label> */
    /*             <br /> */
    /*             <input type='password' id='pwd' name='pwd'/> */
    /*             <br /><br /> */
    /*             <label> Confirm your old password: </label> */
    /*              <br /> */
    /*             <input type='password' id='confirm' name='confirm'/> */
    /*             <br /> <br /> */
    /*             <label> Type your new password: </label> */
    /*              <br /> */
    /*             <input type='password' id='new_pwd' name='new_pwd'/> */
    /*             <br /> <br /> */
    /*             <input type='submit' id='submit' name='submit' value='OK' /> */
    /*             <br /> */
    /*      </p> */
    /* </form></center>"); */
    /* return $ret; */
    /* } */

    public function form_send_verif() {
        $ret = ("<center><form method='post' action='?p=backform&a=send_verif'>
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

    public function form_confirm_reinit() {
        $ret = ("<center><form method='post' action='?p=backform&a=confirm_reinit'>
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
