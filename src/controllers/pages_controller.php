<?php

use function PHPSTORM_META\type;

session_start();
require_once('controllers/base_controller.php');
require('models/user.php');
require('models/message.php');
require('models/exercise.php');
require('models/student.php');
require('models/challenge.php');
class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      if (isset($_SESSION['user'])) {
        $user = UserModel::all();
        $role = UserModel::getRole($_SESSION['user']);
        $this->render('home', array('us' => $user, 'role' => $role));
      } else {
        $this->render('home');
      }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $_SESSION['user'];
      $role = UserModel::getRole($user);
      $access = $_POST['select'];
      if ($user) {
        if ($role[0] == 'student') {
          if ($access == '1') {
            print '<script>window.location.assign("index.php?controller=pages&action=profile");</script>';
          } else if ($access == '2') {
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          } else if ($access == '3') {
            print '<script>window.location.assign("index.php?controller=pages&action=challenge");</script>';
          } else {
            print '<script>alert("Wrong action! Try again");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
          }
        } else if ($role[0] == 'teacher') {
          if ($access == '1') {
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          } else if ($access == '2') {
            print '<script>window.location.assign("index.php?controller=pages&action=challenge");</script>';
          } else {
            print '<script>alert("Wrong action! Try again");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
          }
        }
      } else {
        print '<script>alert("You do not have permission");</script>';
        print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
      }
    }
  }
  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $users =  UserModel::login($username, $password);
      if ($users) {
        $_SESSION['user'] = $username;    // set the username in a session. 
        header("location: /?controller=pages&action=home");
      } else {
        print '<script>alert("Incorrect Username or Password! Try again");</script>';
        print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
      }
    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $this->render('login');
    }
  }

  public function profile()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['user'])) {
      $res = UserModel::info($_SESSION['user']);
      $this->render('profile', array('info' => $res[0],));
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
      if (UserModel::getRole($_SESSION['user'])[0] == 'student') {
        $check = UserModel::check($_SESSION['user']);
        if ($check[0] == $_POST['passwd']) {
          if ($_POST['newpasswd']) {
            UserModel::update($_SESSION['user'], $_POST['newpasswd'], $_POST['email'], $_POST['phone']);
            print '<script>alert("Successfully Change");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=profile");</script>';
          } else {
            UserModel::update($_SESSION['user'], $_POST['passwd'], $_POST['email'], $_POST['phone']);
            print '<script>alert("Successfully Change");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=profile");</script>';
          }
        } else {
          print '<script>alert("Wrong Password");</script>';
          print '<script>window.location.assign("index.php?controller=pages&action=profile");</script>';
        }
      } else {
        UserModel::updateByTeacher($_POST['username'], $_POST['passwd'], $_POST['name'], $_POST['email'], $_POST['phone']);
        // print '<script>alert("Successfully Change");</script>';
        print '<script>window.location.assign("index.php?controller=pages&action=home");</script>';
      }
    }
  }
  public function error()
  {
    $this->render('errors');
  }
  public function logout()
  {
    $_SESSION['user'] = null;
    $this->render('home');
  }
  public function message()
  {
    if (isset($_SESSION['user'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $from = $_SESSION['user'];
        $value = $_POST['message'];
        $to = explode('=', $_SERVER['HTTP_REFERER'])[3];
        messageModel::insert($from, $to, $value);
        print '<script>alert("Message Sent!");</script>';
        print "<script>window.location.assign(\"index.php?controller=pages&action=infor&name=$to\");</script>";
      } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $req = messageModel::all($_SESSION['user']);
        $this->render('inbox', array('inbox' => $req));
      }
    } else {
      print '<script>alert("You do not have permission!");</script>';
      print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
    }
  }
  public function infor()
  {
    if (isset($_GET['name']) && isset($_SESSION['user']) && $_GET['name']) {
      $to = $_GET['name'];
      $bool = UserModel::info($to);
      if ($bool) {
        $username = $_GET['name'];
        $req = UserModel::info($username);
        $mess = messageModel::list($_SESSION['user'], $to);
        $rev = messageModel::rev($_SESSION['user']);
        $role = UserModel::getRole($_SESSION['user']);
        if($username == $_SESSION['user']){
          $this->render('infor', array('info' => $req, 'mess' => $mess, 'role' => $role[0],'rev'=>$rev));
        }
        else{
          $this->render('infor', array('info' => $req, 'mess' => $mess, 'role' => $role[0] ));
        }
      } else {
        print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
      }
    } else {
      print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
    }
  }
  public function alter()
  {
    if (isset($_SESSION['user'])) {
      if (@$_POST['delete']) {
        $to = explode('=', $_SERVER['HTTP_REFERER'])[3];
        $bool = UserModel::info($to);
        if ($bool) {
          $value = $_POST['delete'];
          $from = $_SESSION['user'];
          messageModel::delete($from, $to, $value);
          print '<script>alert("Deleted");</script>';
          print "<script>window.location.assign(\"index.php?controller=pages&action=infor&name=$to\");</script>";
        } else {
          print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
        }
      } else if (@$_POST['edit']) {
        $to = explode('=', $_SERVER['HTTP_REFERER'])[3];
        $bool = UserModel::info($to);
        if ($bool) {
          $value = $_POST['edit'];
          $from = $_SESSION['user'];
          messageModel::delete($from, $to, $value);
          $this->render('edit', array('mess' => $value, 'to' => $to));
        } else {
          print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
        }
      } else if (@$_POST['message']) {
        $to = $to = $_POST['to'];
        $bool = UserModel::info($to);
        if ($bool) {
          $from = $_SESSION['user'];
          $value = $_POST['message'];
          messageModel::insert($from, $to, $value);
          print '<script>alert("Message edited!");</script>';
          print "<script>window.location.assign(\"index.php?controller=pages&action=infor&name=$to\");</script>";
        } else {
          print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
        }
      } else if (@$_POST['deleteuser']) {
        if (UserModel::getRole($_SESSION['user'])[0] == 'teacher') {
          $username = $_POST['deleteuser'];
          UserModel::delete($username);
          print '<script>alert("Delete");</script>';
          print '<script>window.location.assign("index.php?controller=pages&action=home");</script>';
        } else {
          print '<script>alert("You do not have permission!");</script>';
          print '<script>window.location.assign("index.php?controller=pages&action=home");</script>';
        }
      } else if (@$_POST['editinfo']) {
        if (UserModel::getRole($_SESSION['user'])[0] == 'teacher') {
          $username = $_POST['editinfo'];
          $res = UserModel::info($username);
          $this->render('teacher', array('info' => $res[0]));
        } else {
          print '<script>alert("You do not have permission!");</script>';
          print '<script>window.location.assign("index.php?controller=pages&action=home");</script>';
        }
      }
    } else {
      print '<script>alert("You do not have permission!");</script>';
      print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
    }
  }
  public function exercise()
  {
    if (isset($_SESSION['user'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $role = UserModel::getRole($_SESSION['user']);
        $head = studentModel::list();
        $info = array();
        foreach ($head as $h) {
          array_push($info, studentModel::ext($h[0]));
        }
        $list = studentModel::list();
        if ($role[0] == 'student') {
          $this->render('exercise', array('role' => $role[0], 'list' => $list));
        } else {
          $this->render('exercise', array('role' => $role[0], 'head' => $head, 'info' => $info));
        }
      } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $role = UserModel::getRole($_SESSION['user']);
        if ($role[0] == 'teacher') {
          $list = studentModel::list();
          $check = false;
          foreach ($list as $l) {
            if ($l[0] == $_POST['idexercise']) {
              $check = true;
            }
          }
          if ($check) {
            print '<script>alert("Duplicate exercise name, pls input again");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          } else {
            $ext = pathinfo($_FILES['exercise_content']['name'], PATHINFO_EXTENSION);
            studentModel::insert($_POST['idexercise'], 'teacher',$ext);
            move_uploaded_file($_FILES['exercise_content']['tmp_name'], "files/teachers/teacher_" . $_POST['idexercise'] . "." . $ext);
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          }
        } else {
          $list = studentModel::list();
          $check = false;
          foreach ($list as $l) {
            if ($l[0] == $_POST['idexercise']) {
              $check = true;
            }
          }
          if (!$check) {
            print '<script>alert("Not valid name, input again");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          } else {
            $ext = pathinfo($_FILES['ans_content']['name'], PATHINFO_EXTENSION);
            studentModel::upload($_POST['idexercise'], $_SESSION['user'], $ext);
            move_uploaded_file($_FILES['ans_content']['tmp_name'], "files/students/student_" . $_POST['idexercise'] . $_SESSION['user'] . "." . $ext);
            print '<script>window.location.assign("index.php?controller=pages&action=exercise");</script>';
          }
        }
      }
    } else {
      print '<script>window.location.assign("index.php?controller=pages&action=error");</script>';
    }
  }
  public function challenge()
  {
    if(isset($_SESSION['user'])){
      if($_SERVER['REQUEST_METHOD']=='GET'){
        $role = UserModel::getRole($_SESSION['user']);
        $hints = challengeModel::all();
        $this->render('challenge',array('role'=>$role[0], 'hint'=>$hints));
      }
      else if($_SERVER['REQUEST_METHOD']=='POST'){
        if(@$_POST['hint']){
          if(UserModel::getRole($_SESSION['user'])[0]=='teacher'){
            $hint = $_POST['hint'];
            $hash = hash('sha256',$hint);
            $filename =  $_FILES['challenge']['name'].'###'.$hash;
            challengeModel::insert($hint);
            move_uploaded_file($_FILES['challenge']['tmp_name'], "files/challenge/" . $filename);
            print '<script>window.location.assign("index.php?controller=pages&action=challenge");</script>';
          }
          else{
            print '<script>alert("You do not have permission");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
          }
        }
        else if(@$_POST['answer']){
          if(UserModel::getRole($_SESSION['user'])[0]=='student'){
            $ans = $_POST['answer'];
            $hint = hash('sha256',urldecode($_POST['suffix']));
            $filename = $ans.".txt###".$hint;
            if(file_exists("files/challenge/".$filename)){
              $this->render('challenge',array('filecontent'=>file_get_contents("files/challenge/".$filename)));
            }else{
              print '<script>alert("Wrong answer");</script>';
              print '<script>window.location.assign("index.php?controller=pages&action=challenge");</script>';
            }
          }
          else{
            print '<script>alert("You do not have permission");</script>';
            print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
          }
        }
      }
    }
    else{
      print '<script>alert("You do not have permission");</script>';
      print '<script>window.location.assign("index.php?controller=pages&action=login");</script>';
    }
  }
}
