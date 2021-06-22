<?php

/*********************************************************************************
		File name		:		func_date.php
		Function name	:		func_ymd2dmy(str_date)
								func_dmy2ymd(str_date)
		Parameter		:		str_date	(string)	eg: dd-mm-yyyy or yyyy-mm-dd
		Return			:		(string)
		Date created	:		1 August 2005
		Last modify		:		1 August 2005
		Description		:		func_ymd2dmy is a function to convert yyyy-mm-dd
								to dd-mm-yyyy
								func_dmy2ymd is a function to convert dd-mm-yyyy
								to yyyy-mm-dd
 **********************************************************************************/


function func_js_back($str_msg = '') {
  echo "\n<script language='JavaScript'>\n";
  echo "alert('" . addslashes($str_msg) . "');\n";
  echo "window.history.back();\n";
  echo "</script>\n";
  exit();
}

function func_js_directing($str_msg = '', $str_location = '') {
  echo "\n<script language='JavaScript'>\n";
  if (!empty($str_msg))
    echo "alert('" . addslashes($str_msg) . "');\n";
  echo "location.href='" . $str_location . "';\n";
  echo "</script>\n";
  exit();
}

function func_js_confirm($str_msg = '', $str_true = '', $str_false = '') {
  echo "\n<script language='JavaScript'>\n";
  echo "input_box=confirm('" . addslashes($str_msg) . "');\n";
  echo "if (input_box==true)\n";
  echo "{\n";
  echo "	" . $str_true . ";\n";
  echo "}\n";
  echo "else\n";
  echo "{\n";
  echo "	" . $str_false . ";\n";
  echo "}\n";
  echo "</script>\n";
  exit();
}

function func_nl2br_str_list($str_select = '', $str_search = '') {
  $str_pattern = "(" . $str_search . ")";  // searching pattern
  $str_replacement = "<span class='highlight'>\\1</span>";  // replacement string to the pattern match

  $arr_select = explode('\n', $str_select);
  $str_array = "";
  for ($i = 0; $i < count($arr_select); $i++) {
    $str_array .= $arr_select[$i] . "<br />";
  }
  return $str_array;
}

function func_list_paging_post($str_page_url = '', $str_url_opt = '', $int_page_number = 0, $int_max_page = 0, $int_total_rows = 0) {
  global $sys_config;

  $str_page = "Page ";

  for ($x = 1; $x <= $int_max_page; $x++) {
    $str_page .= " [<a href=\"" . $str_page_url . "(" . $x . ");"
      . $str_url_opt
      . "\">"
      . (($x == $int_page_number) ? "<font size=\"4\">" . $x . "</font>" : $x)
      . "</a>]";
  }
  $str_page .= "<br /><br />";
  if ($int_total_rows > TOTAL_RECORDS_PER_PAGE) {
    if ($int_page_number <> 1) {
      $str_page .= "&nbsp;&nbsp;<a href=\"" . $str_page_url . "(1);"
        . $str_url_opt
        . "\"><img alt='image' src=\"" . $sys_config['images_path'] . "page-first.gif\" border=0 "
        . " title=\"Go To First Page\" /></a>";
      $str_page .= "&nbsp;&nbsp;<a href=\"" . $str_page_url . "(" . ($int_page_number - 1) . ");"
        . $str_url_opt
        . "\"><img alt='image' src=\"" . $sys_config['images_path'] . "page-prev.gif\" border=0 "
        . " title=\"Go To Page " . ($int_page_number - 1) . "\" /></a>";
    }
    if ($int_page_number <> $int_max_page) {
      $str_page .= "&nbsp;&nbsp;<a href=\"" . $str_page_url . "(" . ($int_page_number + 1) . ");"
        . $str_url_opt
        . "\"><img alt='image' src=\"" . $sys_config['images_path'] . "page-next.gif\" border=0 "
        . " title=\"Go To Page " . ($int_page_number + 1) . "\" /></a>";
    }
    $str_page .= "&nbsp;&nbsp;<a href=\"" . $str_page_url . "(" . $int_max_page . ");"
      . $str_url_opt
      . "\"><img alt='image' src=\"" . $sys_config['images_path'] . "page-last.gif\" border=0 "
      . " title=\"Go To Last Page\" /></a>";
  }
  return $str_page;
}

function func_get_last_usravl_datend($str_usr_loginid = '', $int_timestamp = 0) {
  global $conn;

  $sql = $conn->prepare("SELECT usravl_datend,UNIX_TIMESTAMP(usravl_datend) AS ts_usravl_datend
					 FROM sys_user_availability
					 WHERE usr_loginid =
					 ORDER BY UNIX_TIMESTAMP(usravl_datend) DESC
					 LIMIT 0,1");
  $sql->execute([$str_usr_loginid]);
  $row_select = $sql->fetch();
  return (($int_timestamp == 0) ? $row_select['usravl_datend'] : $row_select['ts_usravl_datend']);
}

function func_is_comp_expired($str_usr_loginid = '') {
  global $conn;

  $sql = $conn->prepare("SELECT UNIX_TIMESTAMP(usravl_datend) AS usravl_datend
      FROM sys_user_availability
      WHERE usr_loginid =?
      ORDER BY UNIX_TIMESTAMP(usravl_datend) DESC
      LIMIT 0,1");
  $sql->execute([$str_usr_loginid]);
  if ($sql->rowCount() > 0) {
    $row_select = $sql->fetch();
    if ($row_select['usravl_datend'] < time())
      return true;
    else
      return false;
  } else
    return true;
}

function func_right_images() {
  global $con, $sys_config;

  $str_footer = "
						<img alt='image' src=\"./images/mobile_monday.jpg\" />
						<br />
						<a href=\"#\" onclick=\"javascript:func_popup_donate('donate.html','donate');\"><img alt='image' borer=0 src=\"./images/donate.jpg\" /></a>
						<br />
<div id=\"donate-form\" style=\"display:none;top:200;left:200\">
  <strong>Payments By Cheque or Cash</strong><br />
<br />
If you prefer to pay by cheque or cash please bank into :<br />
<br />
<img alt='image' src=\"http://duniaenglish.com/de2/images/ambank.jpg\" /><br />
Bank Name :           Ambank (M) Berhad<br />
Account Name :          LTT Global Communications Sdn Bhd<br />
Account Number :   091-201-200355-4<br />
</div>
						<a href=\"#\" onClick=\"javascript:func_open(2);\"><img alt='image' border=0 src=\"./images/spread.jpg\" /></a>
						<br />
						<a href=\"http://www.duniaenglish.com\" target=\"_blank\"><img alt='image' border=0 src=\"./images/banner-de.jpg\" /></a>
						<br />
						<a href=\"http://www.ipdoum.edu.my\" target=\"_blank\"><img alt='image' border=0 src=\"./images/banner-openuniversity.jpg\" /></a>
		";

  return $str_footer;
}
