# Linux Server Monitoring with Telegram Bot

## Requirements
- Git
- Nginx
- PHP-FPM
- PHP
- BIND
- Certbot

## Installation
- Configure the Web Server and SSL: ``https://certbot.eff.org/lets-encrypt/centosrhel7-nginx``
- Cloning PHP source code: ``https://github.com/xnxmx/servbot.git``
- Chat in Telegram with ``@BotFather (https://t.me/BotFather)`` and create a new bot
- Get your API token (example: ``613961047: AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4``)
- In php file line 2, change ``<authorization_token>`` with your API token (example: ``613961047: AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4``)
- Upload the ``index.php`` file to your Web Server with SSL support
- Set webhook in: ``https://api.telegram.org/bot<authorization_token>/setWebhook?url=https://domain.tld/index.php``
- Open conversation in Telegram with your bot searching: ``@yourBotName``
- Edit ``@yourBotName`` commands:

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
dig - DNS lookup utility
whois - Client for the whois directory service
```

- Enjoy

## Demo
@madfxrXservbot (https://t.me/madfxrXservbot)

## Notes
- SERVBot is still tried on CentOS 7 x86_64 only
- If you are using another operating system, feel free to make changes to an existing PHP source code
