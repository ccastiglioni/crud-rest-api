<?php 

function htmlvalidation($form_data){
        $form_data = trim( stripslashes( htmlspecialchars( $form_data ) ) );
        //$form_data = mysqli_real_escape_string  ($link   , trim(strip_tags($form_data)));
        return $form_data;
    }
 ?>
   
