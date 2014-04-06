<?php
      include 'connect.php';

      if(isset($_POST['post_title']))
      {
      $errors = array();
      $post_title   =    $_POST['post_title'];
      
      if(empty($post_title))
         { 
         header("HTTP/1.0 404 Not Found");
         exit();
         }
         else
         {
      
         $sql = "INSERT INTO
                                                              post(post_title,
                                                                  post_author)
              VALUES('" . mysql_real_escape_string($_POST['post_title']) . "',
                                           '" . $_SESSION['user_name'] . "')";
     
         mysql_query($sql);
         }
      }
?>    