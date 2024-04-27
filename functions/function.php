<?php
function encodePwd(string $password){

    $salt = 'MonBerger3112@';
    $encodedPwd = hash('sha1', $password.$salt);

    return $encodedPwd;
}
