<?php

class Tools {

    public function insert_form($args = array()) {
      $ret = "";
      $tmp = "";
      foreach ($args as $key => $value) {
        $tmp = "$value:<br>";
          $tmp .=  "<input type=text name=$value></input><br>";
          $ret .= $tmp;
      }
      $form = "<form>";
      $form .= $ret;
      $form .= "</form>";
      return $form;
    }

    public function test() {
      return "caca";
    }
}

?>
