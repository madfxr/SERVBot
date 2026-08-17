<?php
    define('BOT_TOKEN', '<authorization_token>');
    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

    // The chat this bot answers to. The webhook URL is public, so without this
    // check anyone who learns it can POST a forged update and run every command
    // below — /id, /uname, /last, /nmap and the rest — with no authentication at
    // all. Set this to your own Telegram chat id (talk to @userinfobot to get it).
    define('OWNER_CHAT_ID', '<owner_chat_id>');

    $content = file_get_contents("php://input");
    $update  = json_decode($content, true);

    // A Telegram webhook also delivers edited_message, channel_post and callbacks,
    // none of which carry message.text — bail out rather than warn on a missing key.
    if (!isset($update["message"]["chat"]["id"], $update["message"]["text"]))
        die();

    $chatID = $update["message"]["chat"]["id"];
    $text   = $update["message"]["text"];

    // Authenticate the sender. This one line closes the disclosure hole AND the
    // path-traversal that an attacker-controlled chat id used to open.
    if ((string)$chatID !== (string)OWNER_CHAT_ID)
        die();

    if ($text == "")
        die();

    switch ($text):

        case "/start":
            $msg = "Welcome to SERVBot - Linux Server Monitoring with Telegram Bot (https://github.com/madfxr/servbot)";
        break;

        case "/df":
            $msg = shell_exec("df -Th");
        break;

        case "/free":
            $msg = shell_exec("free -m");
        break;

        case "/top":
            $msg = shell_exec("top -b -n 1 | head -n 15");
        break;

        case "/ps":
            $msg = shell_exec("ps auxf | head -n 15");
        break;

        case "/mariadbstatus":
            $msg = shell_exec("systemctl status mariadb -l");
        break;

        case "/namedstatus":
            $msg = shell_exec("systemctl status named -l");
        break;

        case "/nginxstatus":
            $msg = shell_exec("systemctl status nginx -l");
        break;

        case "/phpfpmstatus":
            $msg = shell_exec("systemctl status php-fpm -l");
        break;

        case "/sshdstatus":
            $msg = shell_exec("systemctl status sshd -l");
        break;

        case "/id":
            $msg = shell_exec("id");
        break;

        case "/last":
            $msg = shell_exec("last -50");
        break;

        case "/w":
            $msg = shell_exec("w");
        break;

        case "/ls":
            $msg = shell_exec('ls -lah');
        break;

        case "/pwd":
            $msg = shell_exec('pwd');
        break;

        case "/date":
            $msg = shell_exec("date");
        break;

        case "/phpversion":
            $msg = shell_exec("php --version");
        break;

        case "/sysinfo":
            $msg = shell_exec("cat /etc/*release");
        break;

        case "/uname":
            $msg = shell_exec("uname -a");
        break;

        case "/uptime":
            $msg = shell_exec("uptime");
        break;

        case "/nc":
            $msg = shell_exec("nc 192.168.1.1 22");
        break;

        case "/nmap":
            $msg = shell_exec("nmap -p 1-65500 192.168.1.1");
        break;

        case "/ping":
            $msg = shell_exec("ping 192.168.1.1 -c 10");
        break;

        case "/speedtestcli":
            $msg = shell_exec("/opt/speedtest-cli --bytes");
        break;

        case "/telnet":
            $msg = shell_exec("telnet 192.168.1.1 22");
        break;

        case "/traceroute":
            $msg = shell_exec("traceroute 192.168.1.1");
        break;

        case "/dig":
            $msg = shell_exec("dig domain.tld ANY +short");
        break;

        case "/whois":
            $msg = shell_exec("whois domain.tld");
        break;

    endswitch;

    // An unknown command leaves $msg unset; shell_exec can also return null on an
    // empty result. Either way, do not send an empty message.
    if (empty($msg))
        die();

    $sendto = API_URL."sendmessage?chat_id=".urlencode($chatID)."&text=".urlencode($msg);
    file_get_contents($sendto);
?>
