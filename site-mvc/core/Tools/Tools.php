<?php

namespace Core\Tools;

class Tools {

    public function display_form($args = array(), $class="form-inline", $action="#",$label= False,$id='default', $button='default', $blabel='send') {
      $ret = "";
      $tmp = "";
      foreach ($args as $key => $value) {
        $tmp = "<div class='form-group'>";
        $tmp .=  "<input type='text' class='pull-right' placeholder='" . ucfirst($value) . "' name='$value' 'name:$value'/>";
		$tmp .= "</div>";
        $ret .= $tmp;
      }
      $form = "<form class='$class' method='post' action='?p=$action' id='$id'>";
	  $form .= $ret . "<input class='btn btn-primary' type='submit' name='$button' value='$blabel'>";
      $form .= "</br></br>";
	  if ($label != False) {
		  $form .= $this->add_label($label);
	  }
      return $form;
    }

	public function add_label($params){
		$ref = $params['ref_field'];
		$text = $params['text_field'];
    	return "<label class='pull-right' style='margin-right: 90px' ><a style='text-decoration:none' href='$ref'>" . $text . "</a></label>";
	}

    public function test() {
      return "caca";
    }
}

?>
