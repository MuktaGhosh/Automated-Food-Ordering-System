<?php
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }
     public static function checkSession(){
      self::init();
      if (self::get("adminlogin")== false) {
       self::destroy();
       header("Location:login.php");
      }
     }

     public static function checkLogin(){
      self::init();
      if (self::get("adminlogin")== true) {
       header("Location:dashbord.php");
      }
     }

     public static function checkCusLogin(){
      self::init();
      if (self::get("cuslogin")== true) {
       header("Location: order.php");
      }
     }

     public static function destroy(){
      session_destroy();
      header("Location:login.php");
     }
    }
    ?>