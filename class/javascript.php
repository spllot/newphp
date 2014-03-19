<?php
class JavaScript{
	public static function setCharset($new_charset){
		echo "<META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $new_charset . "\">";
	}

	public static function loadEditor(){
		JavaScript::loadEditor2("../js/");
	}

    public static function genEditor($new_field){
        echo JavaScript::getStartTag();
        echo "editor_generate('$new_field');\n";
        echo JavaScript::getEndTag();
    }//getEditor
	
	public static function loadEditor2($path){
        echo "<script language=\"Javascript1.2\">\n";
        echo "  _editor_url = \"$path\";\n";
        echo "	var win_ie_ver = parseFloat(navigator.appVersion.split(\"MSIE\")[1]);\n";
        echo "	if (navigator.userAgent.indexOf('Mac') >= 0){\n";
        echo "		win_ie_ver = 0;\n";
        echo "	}//if\n";
        echo "	if (navigator.userAgent.indexOf('Windows CE') >= 0){\n";
        echo "		win_ie_ver = 0;\n";
        echo "	}//if\n";
        echo "	if (navigator.userAgent.indexOf('Opera') >= 0){\n";
        echo "		win_ie_ver = 0;\n";
        echo "	}//if\n";
        echo "	if (win_ie_ver >= 5.5) {\n";
        echo "		document.write('<scr' + 'ipt src=\"' + _editor_url + 'editor.js\"');\n";
        echo "		document.write(' language=\"Javascript1.2\"></scr' + 'ipt>');\n";
        echo "	}//if\n";
        echo "	else{\n";
        echo "		document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>');\n";
        echo "	}//else\n";
        echo "</script>\n";
    }//loadEditor

    public static function addSource($new_file){
        echo "<script language=\"javascript\" src=\"$new_file\"></script>";
    }//addSource

    public static function getStartTag(){
        return "<script language=\"javascript\">\n";
    }//getStartTag

    public static function getEndTag(){
        return "</script>\n";
    }//getEndTag


    public static function Redirect($new_url){
        echo JavaScript::getStartTag();
        echo "window.location.href='$new_url';\n";
        echo JavaScript::getEndTag();
    }//Redirect

    public static function Execute($new_fun){
        echo JavaScript::getStartTag();
        echo "$new_fun;\n";
        echo JavaScript::getEndTag();
    }//Execute
    
    public static function Reload($new_win){
        echo JavaScript::getStartTag();
        echo "if ($new_win){\n";
        echo "  $new_win.location.reload();\n";
        echo "}\n";
        echo JavaScript::getEndTag();
    }//Reload

    public static function setImage($new_image, $new_src){
        echo JavaScript::getStartTag();
        echo "document['$new_image'].src = '$new_src';\n";
        echo JavaScript::getEndTag();
    }
    
    public static function setURL($new_url, $new_window){
        echo JavaScript::getStartTag();
        echo "if (" . $new_window . "){\n";
        echo $new_window . ".location.href='$new_url';\n";
        echo "}\n";
        echo JavaScript::getEndTag();
    }//setURL

    public static function Alert($new_message){
        echo JavaScript::getStartTag();
        echo "alert('$new_message');\n";
        echo JavaScript::getEndTag();
    }//Alert

    public static function setValue($new_field, $new_value){
        echo JavaScript::getStartTag();
		echo "if(" . $new_field . "){\n";
        echo $new_field . ".value = \"" . $new_value . "\";\n";
		echo "}\n";
        echo JavaScript::getEndTag();
    }//SetValue

    public static function setRadio($new_field, $new_index){
		if($new_index == ""){$new_index = "0";}
       echo JavaScript::getStartTag();
       echo "if(" . $new_field . "){\n";
		echo "		if(" . $new_field . ".length){\n";
		echo "				" . $new_field . "[" . $new_index . "].checked = true;\n";
		echo "			}\n";
		echo "			else{\n";
		echo "				" . $new_field . ".checked = true;\n";
		echo "			}\n";
		echo "	   }\n";
       echo JavaScript::getEndTag();
    }//setRadio

    public static function setRadioValue($new_field, $new_value){
        echo JavaScript::getStartTag();

        echo JavaScript::getEndTag();
    }//setRadioValue

    public static function setCheckBox($new_field, $new_list){
        echo JavaScript::getStartTag();

        echo JavaScript::getEndTag();
    }//setCheckBox

    public static function setCheckBoxValue(){
        echo JavaScript::getStartTag();

        echo JavaScript::getEndTag();
    }//setCheckBoxValue

    public static function setTextarea($new_field, $new_value){
        echo JavaScript::getStartTag();
        echo $new_field . ".value = \"" . str_replace("\n", "\\n", $new_value) . "\";\n";
        echo JavaScript::getEndTag();
    }//setTextarea

	public static function setDiv($new_id, $new_value){
        echo JavaScript::getStartTag();
        echo "document.getElementById('" . $new_id . "').innerHTML = \"" . str_replace("\r\n", "\\n", $new_value) . "\";\n";
        echo JavaScript::getEndTag();
	}

    public static function addCombo($new_field, $new_value, $new_text){
        echo JavaScript::getStartTag();
        echo $new_field . ".options.length++;\n";
        echo $new_field . ".options[" . $new_field . ".options.length - 1].value = \"" . $new_value . "\";\n";
        echo $new_field . ".options[" . $new_field . ".options.length - 1].text = \"" . $new_text . "\";\n";
        echo JavaScript::getEndTag();
    }//addCombo

    public static function setDisabled($new_field){
        echo JavaScript::getStartTag();
        echo $new_field . ".disabled = true;\n";
        echo JavaScript::getEndTag();
    }//setDisabled

	public static function ajaxError($new_msg){
        echo JavaScript::getStartTag();
		echo "Element.update('error', '$new_msg');\n";
        echo JavaScript::getEndTag();
	}

	public static function ajaxUpdateDiv($new_div, $new_text){
        echo JavaScript::getStartTag();
		echo "Element.update(\"$new_div\", \"" . str_replace("\r\n", "\\n", addslashes($new_text)) . "\");\n";
        echo JavaScript::getEndTag();
	}
	public static function ajaxUpdate($new_div, $new_target, $new_method, $new_parameter){
        echo JavaScript::getStartTag();
        echo "var ajax = new Ajax.Updater('$new_div', '$new_target', {method: '$new_method', parameters: '$new_parameter', evalScripts:true});\n";
        echo JavaScript::getEndTag();
	}
}//JavaScript
?>