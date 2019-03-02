# Linux Server Monitoring with Telegram Bot

## Requirments
- Git
- Nginx
- PHP-FPM
- PHP
- Certbot
- Nmap

## Installation
- Configure the web server and SSL: https://certbot.eff.org/lets-encrypt/centosrhel7-nginx
- Cloning PHP source code: https://github.com/xnxmx/servbot.git
- Chat in Telegram with @BotFather (https://t.me/BotFather) and create a new bot
- Get your token key
- In php file, line 2, change ``authorization_token with`` your token
- Upload to your server with SSL support
- Set webhook in: https://api.telegram.org/bot<``authorization_token``>/setWebhook?url=https://domain.tld/index.php
- Add following lines to /etc/sudoers, where username is your account name's domain:

```
username  ALL = NOPASSWD: /usr/bin/df
username  ALL = NOPASSWD: /usr/bin/free
username  ALL = NOPASSWD: /usr/bin/ps
username  ALL = NOPASSWD: /usr/bin/top
username  ALL = NOPASSWD: /usr/bin/date
username  ALL = NOPASSWD: /usr/bin/uptime
username  ALL = NOPASSWD: /usr/bin/uname
username  ALL = NOPASSWD: /usr/bin/cat
username  ALL = NOPASSWD: /usr/bin/w
username  ALL = NOPASSWD: /usr/bin/last
username  ALL = NOPASSWD: /usr/bin/nc
username  ALL = NOPASSWD: /usr/bin/nmap
username  ALL = NOPASSWD: /usr/bin/ping
username  ALL = NOPASSWD: /usr/bin/telnet
username  ALL = NOPASSWD: /usr/bin/traceroute
username  ALL = NOPASSWD: /usr/bin/dig
username  ALL = NOPASSWD: /usr/bin/whois
```

- Open conversation in Telegram with your bot searching @yourBotName
- Edit @yourBotName commands:

```
df - Report file system disk space usage
free - Display amount of free and used memory in the system
ps - Report a snapshot of the current processes
top - Report a snapshot of the current processes
date - Print or set the system date and time
uptime - Tell how long the system has been running
last - Show a listing of last logged in users
w - Show who is logged on and what they are doing
sysinfo - Print system operation information
uname - Print system information
dig - DNS lookup utility
nc - Arbitrary TCP and UDP connections and listens
nmap - Network exploration tool and security / port scanner
ping - Send ICMP ECHO_REQUEST to network hosts
telnet - User interface to the TELNET protocol
traceroute - Print the route packets trace to network host
whois - Client for the whois directory service
```

- Enjoy

## Demo
@madfxrXservbot (https://t.me/madfxrXservbot)

## Notes
- SERVBot is still tried on CentOS 7 x86_64 only
- If you are using another operating system, feel free to make changes to an existing PHP source code
