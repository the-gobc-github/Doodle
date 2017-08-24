<?php

class Tools {

    public function insert_form($args = array(), $class="formclass", $action="#") {
      $ret = "";
      $tmp = "";
      foreach ($args as $key => $value) {
        $tmp = "<br>$value:<br>";
        $tmp .=  "<input type=text name=$value></input>";
        $ret .= $tmp;
      }
      $form = "<form class=$class method='post' action=?p='$action'>";
      $form .= $ret . "<br><br><input type='submit'>";
      $form .= "</form><br>";
      return $form;
    }

    public function test() {
      return "caca";
    }
}

?>
