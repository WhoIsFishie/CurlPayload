<?php

//get user ip and store in ver
$ip_add = $_SERVER["REMOTE_ADDR"];

// echo "The user's IP address is - ".$ip_add;
if (strpos(file_get_contents("ip.txt"), $ip_add) !== false) {   
        //get user agent
        $agent = $_SERVER["HTTP_USER_AGENT"];
        // if user agent is via curl then run this
        if (preg_match("/curl[\/\s](\d+\.\d+)/", $agent)) {
            echo "clear ; echo \"you already visited\" ; clear ;  echo \"hello world\"";
        } else {
            //else run this
            echo "echo \"hello world\"\n";
        }
} else {
    //try to open the file
    ($myfile = fopen("ip.txt", "w")) or die("Unable to open file!\n");
    //log user ip in the file
    $txt = $ip_add . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    //get user agent
    $agent = $_SERVER["HTTP_USER_AGENT"];
    // if user agent is via curl then run this
    if (preg_match("/curl[\/\s](\d+\.\d+)/", $agent)) {
        echo "echo \"hello world\"\n";
    } else {
        //else run this
        echo "echo \"hello world\"\n";
    }
}?>

//writen by @whoisfishie
