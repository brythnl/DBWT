<?php 

function hashPassword($password) {
    return sha1('salt' . $password);
}

?>
