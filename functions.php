<?php
function generateRandomPassword($integer){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!$£&-_àùèì';
  $randPass = '';

  for ($i=0; $i < $integer; $i++){ 
    $randomIndex = mt_rand(0 ,strlen($characters) -1);
    $randPass .= $characters[$randomIndex];
  }
  return $randPass;
}
?>