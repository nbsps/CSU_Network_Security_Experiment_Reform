<?php
function errorMsg($msg){
  echo "<div class='container text-center'>".
       "<div class='alert alert-danger'>".
       "$msg<br>".
       "</div>".
       "<a href='index.html'>Go back</a>".
       "</div>";
}