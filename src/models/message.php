<?php

class messageModel
{
  public $fromuser;
  public $touser;
  public $message;
  function __construct( $fromuser, $touser, $message)
  {
    $this->fromuser = $fromuser;
    $this->touser = $touser;
    $this->message = $message;
  }

  static function all($user)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `fromuser`, `message` FROM messages WHERE `touser`= '".$user."'");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
  static function list($from , $to)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `message` FROM messages WHERE `fromuser` = '".$from."' AND touser = '".$to."'");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
  static function rev( $to)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `fromuser`,`message` FROM messages WHERE touser = '".$to."'");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
  static function insert($from, $to, $value)
  {
    $db = DB::getInstance();
    $db->query("INSERT INTO messages (`fromuser`, `touser`, `message`) VALUES ('$from','$to' ,'$value')");
  }
  
  static function delete($from, $to, $value)
  {
    $db = DB::getInstance();
    $db->query("DELETE FROM messages WHERE `message` = '".$value."' AND `fromuser` = '".$from."' AND `touser` = '".$to."'");
  }
}