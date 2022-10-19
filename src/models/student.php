<?php

class studentModel
{
  public $idexercise;
  public $username;
  public $userans;
  function __construct( $idexercise, $username,$userans)
  {
    $this->idexercise = $idexercise;
    $this->username = $username;
    $this->userans = $userans;
  }
  static function list()
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `idexercise`,`username`,`ext` FROM student WHERE username ='teacher'");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
  static function insert($idexercise, $username, $ext)
  {
    $db = DB::getInstance();
    $db->query( "INSERT INTO student (`idexercise`, `username` , `ext`) VALUES ('$idexercise', '$username' ,'$ext')");
  }
  static function upload($idexercise, $user ,$ext)
  {
    $db = DB::getInstance();
    $db->query( "INSERT INTO student (`idexercise`, `username`, `ext`) VALUES ('$idexercise', '$user' ,'$ext')");
  }
  static function ext($idexercise)
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `username`,`ext` FROM student WHERE `idexercise`='".$idexercise."'");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
}