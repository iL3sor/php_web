<?php

class UserModel
{
  public $username;
  public $password;
  function __construct( $username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  static function all()
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query('SELECT `username`,`name` FROM users');
    foreach ($req->fetchAll() as $item) {
      array_push($list,$item);
    }
    return $list;
  }
  static function login($user, $password)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM users WHERE username='".$user."'"." AND password = '".$password."'");
    foreach ($req->fetchAll() as $item) {
      $list[] = new UserModel($item[0] ,$item[1]);
    }
    return $list;
  }
  static function info($user)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT name, email, phone ,`username`,`password` FROM users WHERE username='".$user."'");
    foreach ($req->fetchAll() as $item) {
        array_push($list, $item);
    }
    return $list;
  }
  static function getRole($user)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `role` FROM users WHERE username='".$user."'");
    foreach ($req->fetchAll() as $item) {
        array_push($list, $item[0]);
    }
    return $list;
  }
  static function check($user)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `password` FROM users WHERE username='".$user."'");
    foreach ($req->fetchAll() as $item) {
        array_push($list, $item[0]);
    }
    return $list;
  }
  static function update($user ,$password, $email, $phone)
  {
    $db = DB::getInstance();
    $req = $db->query("UPDATE users SET `password`= '".$password."' , `email`= '".$email."' , `phone`= '".$phone."' WHERE `username`= '".$user."'");
    return $req;
  }
  static function delete($user)
  {
    $db = DB::getInstance();
    $req = $db->query("DELETE FROM users WHERE username='".$user."'");
    return $req;
  }
  static function updateByTeacher($username,$password, $name, $email, $phone)
  {
    $db = DB::getInstance();
    $req = $db->query("UPDATE users SET `username`= '".$username."', `name`= '".$name."', `password`= '".$password."' , `email`= '".$email."' , `phone`= '".$phone."' WHERE `username`= '".$username."'");
    return $req;
  }
}