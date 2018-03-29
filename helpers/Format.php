<?php
    /**
    * Format Class
    */
    class Format{
     public function formatDate($date){
      date_default_timezone_set('America/New_York');
      $timestamp = strtotime($date); 
$new_date = date('Y-m-d H:i:s', $timestamp);
return $new_date;
      //return date("Y-d-m", strtotime($date));
     }

     public function textShorten($text, $limit = 400){
      $text = $text. " ";
      $text = substr($text, 0, $limit);
      $text = substr($text, 0, strrpos($text, ' '));
      $text = $text.".....";
      return $text;
     }

     public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
     }

     public function title(){
      $path = $_SERVER['SCRIPT_FILENAME'];
      $title = basename($path, '.php');
      //$title = str_replace('_', ' ', $title);
      if ($title == 'index') {
       $title = 'home';
      }elseif ($title == 'contact') {
       $title = 'contact';
      }
      return $title = ucfirst($title);
     }
    }
    ?>