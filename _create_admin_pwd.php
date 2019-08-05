<?php


$sPwd = 'pwd123'; 
$sHashedPwd = password_hash($sPwd , PASSWORD_BCRYPT, array('cost' => 14));
echo 'Password is: ' . $sHashedPwd;
