# CDG Home: Custom Home / New Tab Page Featuring:
• Stock Ticker<br>
• Clock & Date<br>
• Notepad<sup>1</sup><br>
• Calendar<br>
• Custom Timer<sup>2</sup><br>
• Current Weather & Location<br>
• Gmail Inbox Integration<br>
• Spotify Integration / Controller<br>
• Live Customizable News<br>
• Day & Night Modes<br>
• Custom Background Images<br>
• Extensive Settings With Changeable Units, Formats & Options<br>
• Beautiful Scaleable UI<br><br>

<sup>1</sup> Notepad saving is currently unstable.<br>
<sup>2</sup> Timer Coming Soon<br><br>
![Day](https://raw.githubusercontent.com/cdgco/home/master/img/day.png)<br><br>
![Custom](https://raw.githubusercontent.com/cdgco/home/master/img/custom.png)<br><br>
![Night](https://raw.githubusercontent.com/cdgco/home/master/img/night.png)

## Requirements
• Web Server with PHP 5.5.X or above.<br>
• MySQL Database with MySQL Event Scheduler enabled.<br>
• Weather Underground API Key.<br>
• Google reCAPTCHA Invisible API Key.<br>
• Google Cloud Gmail Client ID.<br>

## Install Guide
1. Clone or download the CDG Home repository to a php capable server.
2. Create a MySQL database and run the db.sql file to create table.
3. Configure the /classes/phpmailer/mail.php with your phpmailer, smtp, or pop3 settings.
4. Configure the /includes/config-example.php file with your timezone, MySQL database, absolute application address, email address, and password reset email details.
5. Rename config-example.php to config.php.

Note 1: Timezone must be set correctly in config.php for gmail to function.<br>
Note 2: Custom SSL settings will make stock ticker fail as MacroAxis SSL requires a paid license.<br>

## How-To: Setup Gmail API

1. Go to https://console.cloud.google.com/apis/
2. Create a new project and enable the Gmail API in the API Manager Library
3. On the Gmail API Page, create credentials for: Gmail API -> Web Browser -> User Data
4. Name your credentials and set the Javascript origin to your domain.
5. Add two Javascript callbacks: <br>
&nbsp;&nbsp;&nbsp;    a. http://[YOUR-DOMAIN.COM/INSTALLATION-PATH]/auth.php<br>
&nbsp;&nbsp;&nbsp;   b. http://[YOUR-DOMAIN.COM/INSTALLATION-PATH]/qauth.php<br>
6. Create OAuth Consent Screen
7. Copy ClientID to the config.php file.

## How-To: Setup reCAPTCHA API

1. Go to https://www.google.com/recaptcha/admin
2. Select Invisible reCAPTCHA, add your domain, accept terms and register.
3. Copy <b>SITE KEY</b> to the config.php file.

## How-To: Setup Weather Underground API

1. Create an account at http://api.wunderground.com/api, verify email and login.
2. Go to http://api.wunderground.com/weather/api/d/pricing.html and sign up for the Stratus Developer Plan.
3. Fill out registration questionare.
4. Copy API Key ID to config.php.

## To-Do
<s>1. Change Initial Google Authorization Flow</s><br>
<s>2. Setup AJAX Background Content Refresh (Home & Settings)</s><br>
<s>3. Convert PHP Session System to Cookies for longer logins</s><br>
<s>4. Add all changeable variables to config.php</s><br>
<s>5. Combine dbconnect.php & config.php</s><br>
<s>6. Setup custom backgrounds in setting</s><br>
<s>7. Change scaling system from screen width to window width</s><br>
<s>8. Extensive SSL Support</s><br>
9. Add new features to blank tiles<br>
