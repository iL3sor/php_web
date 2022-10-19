<?php

class challengeModel
{
  public $hint;
  public $hash;
  function __construct( $hint, $hash)
  {
    $this->hint = $hint;
    $this->hash = $hash;
  }

  static function all()
  {
    $list = array();
    $db = DB::getInstance();
    $req = $db->query("SELECT `hint` FROM `challenge` ");
    foreach ($req->fetchAll() as $item) {
      array_push($list, $item);
    }
    return $list;
  }
  static function insert($hint )
  {
    $db = DB::getInstance();
    $db->query("INSERT INTO `challenge` (`hint`) VALUES ('$hint')");
  }
}