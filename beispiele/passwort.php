<?php 

function hashPassword($password, $salt) {
    return sha1($salt . $password);
}

?>
