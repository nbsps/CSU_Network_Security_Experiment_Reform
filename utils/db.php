<?php

class UserDao{
  private $dbhost="127.0.0.1";
  private $dbuser="root";
  private $dbpass="root";
  private $dbname="user";
  private $conn=null;

  public function __construct(){
    $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    if ($this->conn->connect_error) {
      echo "<div class='container text-center'>Connection failed: $this->conn->connect_error\n</div>";
      die();
    }
  }

  public function query($sql){
    if (!$result = $this->conn->query($sql)) {
      echo "</div>".
           "<div class='container text-center'>".
           'Login Failed!<br/>There was an error running the query [' . $this->conn->error . ']\n'.
           "</div>";
      die();
    }

    return $this->virtualModel($result);
  }

  private function virtualModel($result){
    $return_arr = array();
    while($row = $result->fetch_assoc()){
      array_push($return_arr,$row);
    }

    $id = $return_arr[0]['ID'];
    $name = $return_arr[0]['Name'];
    $eid = $return_arr[0]['EID'];
    $salary = $return_arr[0]['Salary'];
    $birth = $return_arr[0]['birth'];
    $ssn = $return_arr[0]['SSN'];
    $pwd = $return_arr[0]['Password'];

    return [$id, $name, $eid, $salary, $birth, $ssn, $pwd];
  }

  public function __destruct(){
    $this->conn->close();
  }
}

$userDao = new UserDao();
