<?php

class exeModel
{
  public $idexercise;
  public $exercisecontent;
  public $username;
  public $userans;
  function __construct( $idexercise, $exercisecontent, $username,$userans)
  {
    $this->idexercise = $idexercise;
    $this->exercisecontent = $exercisecontent;
    $this->username = $username;
    $this->userans = $userans;
  }

  //   static function insert($idexercise,$exercisecontent)
  // {
  //   $db = DB::getInstance();
  //   $query = "INSERT INTO `exercise` (`idexercise`, `exercisecontent`) VALUES (?, ?)";
  //   $statement = $db->prepare($query);
  //   $statement->execute(array($idexercise, $exercisecontent));
  // }
    static function insert($idexercise)
  {
    $db = DB::getInstance();
    $query = "INSERT INTO `exercise` (`idexercise`) VALUES ($idexercise)";
  }

//   static function list($from , $to)
//   {
//     $list = array();
//     $db = DB::getInstance();
//     $req = $db->query("SELECT `message` FROM messages WHERE `fromuser` = '".$from."' AND touser = '".$to."'");
//     foreach ($req->fetchAll() as $item) {
//       array_push($list, $item);
//     }
//     return $list;
//   }
//   static function insert($from, $to, $value)
//   {
//     $db = DB::getInstance();
//     $db->query( "INSERT INTO messages (`fromuser`, `touser`, `message`) VALUES ('$from','$to' ,'$value')");
//   }
  
//   static function delete($from, $to, $value)
//   {
//     $db = DB::getInstance();
//     $db->query( "DELETE FROM messages WHERE `message` = '".$value."' AND `fromuser` = '".$from."' AND `touser` = '".$to."'");
//   }
}