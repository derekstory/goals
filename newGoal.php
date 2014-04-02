<?php
      include 'connect.php';

      if(isset($_POST['post_title']))
      {
      $post_title   =    $_POST['post_title'];

      $sql = "INSERT INTO
                                                              post(post_title,
                                                                  post_author)
              VALUES('" . mysql_real_escape_string($_POST['post_title']) . "',
                                           '" . $_SESSION['user_name'] . "')";
     
      mysql_query($sql);
      }
?>    