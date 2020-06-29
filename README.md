# CDG Home: Custom Home / New Tab Page Featuring:
• Stock Ticker<br>
• Clock & Date<br>
• Notepad<br>
• Calendar<br> 
• Custom Timer (Coming Soon)<br>
• Current Weather & Location<br>
• Gmail Inbox Integration<br>
• Spotify Integration / Controller<br> 
• Live Customizable News<br>
• Day & Night Modes<br>
• Custom Background Images<br>
• Extensive Settings With Changeable Units, Formats & Options<br>
• Beautiful Scaleable UI<br><br>

![Day](https://raw.githubusercontent.com/cdgco/home/master/img/day.png)<br><br>
![Custom](https://raw.githubusercontent.com/cdgco/home/master/img/custom.png)<br><br>
![Night](https://raw.githubusercontent.com/cdgco/home/master/img/night.png)

## Requirements
• Web Server with PHP 5+<br>
• MySQL Database with MySQL Event Scheduler enabled.<br>
• Open Weather API Key.<br>
• Google reCAPTCHA Invisible API Key.<br>
• Google Cloud Gmail Client ID.<br>

## Install Guide
1. Clone or download the CDG Home repository to a php capable server.
2. Create a MySQL database and run the db.sql file to create table.
3. Configure the /classes/phpmailer/mail.php with your phpmailer, smtp, or pop3 settings.
4. Configure the /includes/config-example.php file with your timezone, MySQL database, absolute application address, email address, and password reset email details.
5. Rename config-example.php to config.php.

Note: Timezone must be set correctly in config.php for gmail to function.<br>

## How-To: Setup Gmail API

1. Go to https://console.cloud.google.com/apis/
2. Create a new project and enable the Gmail API in the API Library
3. On the Gmail API Page, create credentials for: OAuth Client ID -> Web Application
4. Name your credentials and set the Javascript origin to your domain.
5. Add two Javascript callbacks: <br>
&nbsp;&nbsp;&nbsp;    a. http://[YOUR-DOMAIN.COM/INSTALLATION-PATH]/auth.php<br>
&nbsp;&nbsp;&nbsp;   b. http://[YOUR-DOMAIN.COM/INSTALLATION-PATH]/qauth.php<br>
6. Create OAuth Consent Screen. You may need to verify your consent screen to remove security warnings.
7. Copy ClientID to the config.php file.

## How-To: Setup reCAPTCHA API

1. Go to https://www.google.com/recaptcha/admin
2. Select reCAPTCHA v2 -> Invisible reCAPTCHA badge, add your domain, accept terms and register.
3. Copy <b>SITE KEY</b> to the config.php file.

## How-To: Setup OpenWeatherMap API

1. Create an account at https://openweathermap.org, verify email and login.
2. Go to https://openweathermap.org/price and subscribe to the Free plan.
4. Copy API Key from https://home.openweathermap.org/api_keys to config.php.
