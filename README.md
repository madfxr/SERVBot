# Linux Server Monitoring with Telegram Bot

## Requirements
- Git.
- Nginx.
- PHP-FPM.
- PHP.
- BIND.
- Certbot.
- Telegram.

## Installation
- Configure the Web Server and SSL with Certbot: ``https://certbot.eff.org/`` (pick your OS and web server; the old CentOS/RHEL 7 guide is end-of-life).
- Cloning PHP source code: ``https://github.com/madfxr/servbot.git``.
- Chat in Telegram with ``@BotFather (https://t.me/BotFather)`` and create a new bot.
- Get your API token (example: ``613961047:AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4``).
- In ``index.php``, set ``BOT_TOKEN`` to your API token.
- **Set ``OWNER_CHAT_ID`` to your own Telegram chat id** so the bot only answers you — the webhook URL is public, and without this anyone who finds it can run every command. Get your id from ``@userinfobot (https://t.me/userinfobot)``.
- Upload the ``index.php`` file to your Web Server with SSL support.
- Then access the following URL: ``https://api.telegram.org/bot<authorization_token>/setWebhook?url=https://domain.tld/index.php`` in the web browser to set the webhook (example: ``https://api.telegram.org/bot613961047:AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4/setWebhook?url=https://domain.tld/index.php``.
- Chat in Telegram with ``@BotFather (https://t.me/BotFather)`` and edit ``@yourBotName`` commands:

```
df - Report file system disk space usage
free - Display amount of free and used memory in the system 
ps - Report a snapshot of the current processes
top - Report a snapshot of the current processes
namedstatus - Show Internet domain name server service status
nginxstatus - Show HTTP and reverse proxy server, mail proxy server service status
phpfpmstatus - Show PHP FastCGI Process Manager service status
sshdstatus - Show OpenSSH SSH service status
date - Print or set the system date and time
uptime - Tell how long the system has been running
id - Print real and effective user and group IDs
ls - List directory contents
pwd - Print name of current/working directory
last - Show a listing of last logged in users
w - Show who is logged on and what they are doing
phpversion - Show PHP version number
sysinfo - Print system operation information
uname - Print system information
nc - Arbitrary TCP and UDP connections and listens
ping - Send ICMP ECHO_REQUEST to network hosts
telnet - User interface to the TELNET protocol
traceroute - Print the route packets trace to network host
curl - Transfer data from or to a server
dig - DNS lookup utility
whois - Client for the whois directory service
```

## Notes
- SERVBot is still tried on CentOS 7 x86_64 only.
- If you are using another operating system, feel free to make changes to an existing PHP source code.
