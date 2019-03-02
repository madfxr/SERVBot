<?php
    define('BOT_TOKEN', '<authorization_token>');
    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
 
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    $chatID = $update["message"]["chat"]["id"];
    $text = $update['message']['text'];
    $file = "$chatID/$chatID.txt";
 
    if ($text == "")
        die();
 
    if (!file_exists($chatID)):
        mkdir($chatID, 0700, true);
        fopen($file, 'w');
    endif;
 
    switch ($text):
 
        case "/start": 
            file_put_contents($file);
            $msg = "Welcome to SERVBot | Linux Server Monitoring with Telegram Bot (https://github.com/xnxmx/servbot)";
        break;

        case "/df":
            file_put_contents($file);
            $msg = shell_exec("df -Th");
        break;
 
        case "/free":
            file_put_contents($file);
            $msg = shell_exec("free -m");
        break;

        case "/top": 
            file_put_contents($file);
            $msg = shell_exec("top -b -n 1 | head -n 15");
        break;
 
        case "/ps":
            file_put_contents($file);
            $msg = shell_exec("ps auxf | head -n 15");
        break;

        case "/mariadbstatus":
            file_put_contents($file);
            $msg = shell_exec("systemctl status mariadb -l");
        break;

        case "/namedstatus":
            file_put_contents($file);
            $msg = shell_exec("systemctl status named -l");
        break;

        case "/nginxstatus":
            file_put_contents($file);
            $msg = shell_exec("systemctl status nginx -l");
        break;

        case "/phpfpmstatus":
            file_put_contents($file);
            $msg = shell_exec("systemctl status php-fpm -l");
        break;

        case "/sshdstatus":
            file_put_contents($file);
            $msg = shell_exec("systemctl status sshd -l");
        break;

        case "/id":
            file_put_contents($file);
            $msg = shell_exec("id");
        break;

        case "/last":
            file_put_contents($file);
            $msg = shell_exec("last -50");
        break;

        case "/w":
            file_put_contents($file);
            $msg = shell_exec("w");
        break;

        case "/ls":
            file_put_contents($file);
            $msg = shell_exec('ls -lah');
        break;

        case "/pwd":
            file_put_contents($file);
            $msg = shell_exec('pwd');
        break;

        case "/date":
            file_put_contents($file);
            $msg = shell_exec("date");
        break;

        case "/phpversion":
            file_put_contents($file);
            $msg = shell_exec("php --version");
        break;

        case "/sysinfo":
            file_put_contents($file);
            $msg = shell_exec("cat /etc/*release");
        break;

        case "/uname":
            file_put_contents($file);
            $msg = shell_exec("uname -a");
        break;

        case "/uptime":
            file_put_contents($file);
            $msg = shell_exec("uptime");
        break;

        case "/nc":
            file_put_contents($file);
            $msg = shell_exec("nc 192.168.1.1 22");
        break;

        case "/nmap":
            file_put_contents($file);
            $msg = shell_exec("nmap -p 1-65500 192.168.1.1");
        break;

        case "/ping":
            file_put_contents($file);
            $msg = shell_exec("ping 192.168.1.1 -c 10");
        break;
 
        case "/speedtestcli":
            file_put_contents($file);
            $msg = shell_exec("/opt/speedtest-cli --bytes");
        break;

        case "/telnet":
            file_put_contents($file);
            $msg = shell_exec("telnet 192.168.1.1 22");
        break;

        case "/traceroute":
            file_put_contents($file);
            $msg = shell_exec("traceroute 192.168.1.1");
        break;

        case "/dig":
            file_put_contents($file);
            $msg = shell_exec("dig domain.tld ANY +short");
        break;

        case "/whois":
            file_put_contents($file);
            $msg = shell_exec("whois domain.tld");
        break;
 
    endswitch;
 
    $sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".urlencode($msg);
    file_get_contents($sendto);
?>
