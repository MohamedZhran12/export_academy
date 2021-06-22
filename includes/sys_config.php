<?php

  /*** system ***/
  $sys_config['system_name'] = "Mobile University";
  $sys_config['host_name'] = "ssm.mymobileuni.net";
  $sys_config['folder_name'] = "ssm";
  $sys_config['email_url'] = "http://".$sys_config['host_name']."/".$sys_config['folder_name']."/";
  $sys_config['system_url'] = "http://".$sys_config['host_name']."/".$sys_config['folder_name']."/";
  $sys_config['debug'] = false; // enable/disable debuging information
  $sys_config['email_notification'] = true;
  $sys_config['email'] = "admin@mymobileuni.com";
  $sys_config['email_signature'] = "The MyMobileUniversity Team";

  // path
  $sys_config['document_root'] = "./";
  $sys_config['includes_path'] = $sys_config['document_root']."includes/";
  $sys_config['images_path'] = $sys_config['document_root']."images/";
  $sys_config['lttcom_images_path'] = "http://lttcom.com/v3/images/";
  $sys_config['session_path'] = $sys_config['document_root']."session/";
?>
