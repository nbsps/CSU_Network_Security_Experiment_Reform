<?php
include 'header.php';
include 'utils/db.php';
include 'utils/ErrorMsg.php';
include 'utils/DrawLaout.php';

$input_uname = $_GET['username'];
$input_pwd = $_GET['Password'];

list($id, $uname, $eid, $salary, $birth, $ssn, $pwd) = $userDao->query("SELECT * FROM hashtable WHERE (name= '$input_uname') and (Password='".md5($input_pwd, true)."')");

if(!$id) {
  errorMsg("uname or pwd error!");
}else{
  drawLayout($id,$uname,$eid,$salary,$birth,$ssn,$pwd);
}
