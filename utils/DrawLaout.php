<?php

function drawLayout($id,$name,$eid,$salary,$birth,$ssn,$pwd){
  echo "<div class='container col-lg-4 col-lg-offset-4 text-center'>".
       "<br><h1><b> $name Profile </b></h1>".
       "<hr><br>".
       "<table class='table table-striped table-bordered'>".
       "<thead class='thead-dark'>".
       "<tr>".
       "<th scope='col'>Key</th>".
       "<th scope='col'>Value</th>".
       "</tr>".
       "</thead>".
       "<tr>".
       "<th scope='row'>Employee ID</th>".
       "<td>$eid</td>".
       "</tr>".
       "<tr>".
       "<th scope='row'>Salary</th>".
       "<td>$salary</td>".
       "</tr>".
       "<tr>".
       "<th scope='row'>Birth</th>".
       "<td>$birth</td>".
       "</tr>".
       "<tr>".
       "<th scope='row'>SSN</th>".
       "<td>$ssn</td>".
       "</tr>".
       "</table>";
}