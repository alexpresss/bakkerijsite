<?php

if($_POST["payload"]){
    shell_exec('echo "gelukt" > test.txt');
}

?>