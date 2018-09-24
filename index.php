<?php

    define('BOT_TOKEN', '663961047:AAFWy0k60ekLssujSIkRacmKuDqnTnq8Wl4');
    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    $chatID = $update["message"]["chat"]["id"];
    $text = $update['message']['text'];
    $file = "$chatID/$chatID.txt";

    if ($text == "")
        die();

    if (!file_exists($chatID)) :
        mkdir($chatID, 0700, true);
        fopen($file, 'w');
    endif;

    switch ($text):

        case "/start" : 
            file_put_contents($file);
            $msg = "Welcome to SERVBot | Linux Server Monitoring with Telegram Bot";
        break;

        case "/free":
            file_put_contents($file);
            $msg = shell_exec("free -m");
        break;

        case "/df":
            file_put_contents($file);
            $msg = shell_exec("df -Th");
        break;

        case "/last":
            file_put_contents($file);
            $msg = shell_exec("last -50");
        break;

        case "/ls":
            file_put_contents($file);
            $msg = shell_exec('ls -lah');
        break;	

        case "/top" : 
            file_put_contents($file);
            $msg = shell_exec("top -b -n 1 | head -n 15");
        break;

        case "/ps" :
            file_put_contents($file);
            $msg = shell_exec("ps auxf | head -n 15");
        break;
        
        case "/uptime":
            file_put_contents($file);
            $msg = shell_exec("uptime");
        break;

        case "/sysinfo":
            file_put_contents($file);
            $msg = shell_exec("cat /etc/*release");
        break;

        case "/w":
            file_put_contents($file);
            $msg = shell_exec("w");
        break;

        case "/date":
            file_put_contents($file);
            $msg = shell_exec("date");
        break;

        case "/ping":
            file_put_contents($file);
            $msg = shell_exec("ping 103.23.21.177 -c 10");
        break;	

        case "/traceroute":
            file_put_contents($file);
            $msg = shell_exec("traceroute 103.23.21.177");
        break;	

        case "/nmap":
            file_put_contents($file);
            $msg = shell_exec("nmap -p 1-65500 103.23.21.177");
        break;

        case "/whois":
            file_put_contents($file);
            $msg = shell_exec("whois pwned.my.id");
        break;

        case "/uname":
            file_put_contents($file);
            $msg = shell_exec("uname -a");
        break;

        case "/shutdown":
            file_put_contents($file);
            $msg = shell_exec("shutdown now");
        break;

        case "/reboot":
            file_put_contents($file);
            $msg = shell_exec("reboot");
        break;

        case "/poweroff":
            file_put_contents($file);
            $msg = shell_exec("poweroff");
        break;

    endswitch;

    $sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".urlencode($msg);
    file_get_contents($sendto);
?>
