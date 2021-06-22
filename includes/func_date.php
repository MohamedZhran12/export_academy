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


	function func_ymd2dmy($str_date = '')
	{
		$str_date	=	trim($str_date);
		if (empty($str_date) == true)
			return '';
		if ((is_numeric(substr($str_date,0,4)) == true) &&
			(is_numeric(substr($str_date,5,2)) == true) &&
			(is_numeric(substr($str_date,-2)) == true))
			return (substr($str_date,8,2) . "-" . substr($str_date,5,2) . "-" . substr($str_date,0,4));
		else
			return '';
	}


	function func_dmy2ymd($str_date = '')
	{
		$str_date	=	trim($str_date);
		if (empty($str_date) == true)
			return '';
		if ((is_numeric(substr($str_date,0,2)) == true) &&
			(is_numeric(substr($str_date,3,2)) == true) &&
			(is_numeric(substr($str_date,-4)) == true))
			return (substr($str_date,6,4) . "-" . substr($str_date,3,2) . "-" . substr($str_date,0,2));
		else
			return '';
	}

	function func_mdy2ymd($str_date = '')
	{
		$str_date	=	trim($str_date);
		if (empty($str_date) == true)
			return '';
		if ((is_numeric(substr($str_date,0,2)) == true) &&
			(is_numeric(substr($str_date,3,2)) == true) &&
			(is_numeric(substr($str_date,-4)) == true))
			return (substr($str_date,6,4) . "-" .substr($str_date,0,2). "-" .substr($str_date,3,2));
		else
			return '';
	}



	function func_ymd2dmytime($str_date = '')
	{
		$str_date	=	trim($str_date);
		if (empty($str_date) == true)
			return '';
		if ((is_numeric(substr($str_date,0,4)) == true) &&
			(is_numeric(substr($str_date,5,2)) == true) &&
			(is_numeric(substr($str_date,-2)) == true))
			return (substr($str_date,8,2) . "-" . substr($str_date,5,2) . "-" . substr($str_date,0,4). substr($str_date,10,18));
		else
			return '';
	}


	function func_ymd2timestamp($str_date = '', $int_hour = 0, $int_min = 0, $int_second = 0)
	{
		$str_date	=	trim($str_date);
		if (empty($str_date) == true)
			return '';

		$int_day = substr($str_date,8,2);
		$int_mon = substr($str_date,5,2);
		$int_year = substr($str_date,0,4);

		if ((is_numeric($int_day) == true) &&
			(is_numeric($int_mon) == true) &&
			(is_numeric($int_year) == true))
			return mktime($int_hour,$int_min,$int_second,$int_mon,$int_day,$int_year);
		else
			return '';
	}

	function func_input_date($str_id_name = '', $str_cmd = '', $str_arr = '', $str_value = '', $int_default_empty = 0)
	{
		global $sys_config;

		$str_input = "
		<input class=\"inputwb\" type=\"text\" name=\"".((!empty($str_id_name))? $str_id_name : 'txt_date')."\"
				 id=\"".((!empty($str_id_name))? $str_id_name : 'txt_date')."\"
				 size=\"10\"
				 value=\""
				 .((!empty($str_value))? $str_value : (($int_default_empty == 0)? date("d-m-Y") : ''))
				 ."\" readonly=\"true\" />\n
									  &nbsp;<img alt='image' src=\"".$sys_config['images_path']."calendar/cal.gif\"
			id=\"".((!empty($str_cmd))? $str_cmd : 'cmd_date')."\"
			 width=\"16px\" height=\"16px\" style=\"cursor:pointer;\" />\n
    <script language=\"JavaScript\" type=\"text/javascript\">\n
		<!--//\n
			var ".((!empty($str_arr))? $str_arr : 'cmd_date')." =	{	inputField	: '".((!empty($str_id_name))? $str_id_name : 'cmd_date')."', \n
											ifFormat	: '%d-%m-%Y',\n
											button		: '".((!empty($str_cmd))? $str_cmd : 'cmd_date')."',\n
											weekNumbers	: false,\n
											showsTime	: false,\n
											cache		: true	};\n
			Calendar.setup(".((!empty($str_arr))? $str_arr : 'cmd_date').");\n
		//-->\n
		</script>\n
		";

		return $str_input;

	}

?>
