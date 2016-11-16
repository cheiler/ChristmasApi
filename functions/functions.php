<?php
date_default_timezone_set('UTC');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function age($d, $m, $y){
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $m, $d, $y))) > date("md")
    ? ((date("Y") - $y) - 1)
    : (date("Y") - $y));
  return $age;
}

