<?php

namespace model;

class Model {

  static function connect()
  {
    $dsn = "mysql:host=sql4.freesqldatabase.com;dbname=sql4479519;charset=UTF8";
    $user = "sql4479519";
    $pass = "Qv34BBTXiL";
    return new \PDO($dsn, $user, $pass);
  }

}