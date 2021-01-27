<?php

if($_POST["payload"]){
    shell_exec("cd /var/www/html/bakkerijsite && git pull");
}

?>