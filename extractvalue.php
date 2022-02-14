<?php
include 'header.php';
include 'utils/db.php';
include 'utils/ErrorMsg.php';
include 'utils/DrawLaout.php';

$input_uname = $_GET['username'];
$input_pwd = $_GET['Password'];

list($id, $uname, $eid, $salary, $birth, $ssn, $pwd) = $userDao->query("SELECT * FROM credential WHERE name= '$input_uname' and Password='$input_pwd'");

if(!$id) {
  errorMsg("User not exist!");
  return;
}

if($input_pwd === $pwd){
  drawLayout($id,$uname,$eid,$salary,$birth,$ssn,$pwd);
}else{
  errorMsg("Login Failed!");
  return;
}
