<?php

function func_get_user_detail($str_usr_loginid = '') {

  $sql_select = "SELECT
    sys_user.usr_id,
    sys_user.usr_loginid,
    sys_user.usr_fullname,
    sys_user.usr_lastlogin,
    sys_user.usr_email,
    sys_user.level_id,
    sys_user_level.level_name,
    sys_user.usr_active
     FROM sys_user
     LEFT OUTER JOIN sys_user_level
        ON sys_user.level_id = sys_user_level.level_id
     WHERE sys_user.usr_loginid =?";
  global $conn;
  $sql = $conn->prepare($sql_select);
  $sql->execute([addslashes($str_usr_loginid)]);
  return $sql->fetch();
}

function func_update_user_login($str_usr_loginid = '') {
  global $conn;
  $sql = $conn->prepare("UPDATE sys_user SET
    usr_lastlogin=NOW()
    WHERE sys_user.usr_loginid =?");
  $sql->execute([addslashes($str_usr_loginid)]);
}

function func_get_usr_fullname($str_user_loginid = '') {
  global $conn;

  $sql = $conn->prepare("SELECT *
     FROM sys_user
    WHERE usr_loginid=?");
  $sql->execute([$str_user_loginid]);
  $row_select = $sql->fetch();
  return $row_select['usr_fullname'];
}

function func_is_usr_expired($str_usr_loginid = '') {
  global $conn;

  $sql = $conn->prepare("SELECT UNIX_TIMESTAMP(usravl_datend) AS usravl_datend
 FROM sys_user_availability
 WHERE usr_loginid = ?
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
