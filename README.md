![Build](https://github.com/kodkraft/sele/workflows/Build/badge.svg)
# Sele
Sele is a free open source ecommerce platform build with laravel for online merchants. 

## Requirements

* PHP >= 8.0


## Installation
##### Ensure that required php modules are installed
```bash
sudo apt install php8.0-fpm php8.0-mysql php8.0-curl php8.0-xml php8.0-mbstring
```
```bash
cd /var/www/
```
##### Clone project to your local
```bash
git clone git@github.com:kodkraft/sele.git
```
##### Change your working directory
```bash
cd /var/www/sele/
```
#### if you are using multiple php versions change php version to 8.0
```bash
sudo update-alternatives --set php /usr/bin/php8.0
```
```bash
composer install
```
```bash
cp .env.testing ./.env
```



##### Create Symbolic Link
```bash
ln -s /var/www/sele/public/ /var/www/html/sele
```
##### Create a apache configuration file using vim or nano
```bash 
sudo vim /etc/apache2/sites-available/sele.conf
```
and this configuration to file
```xml
<VirtualHost *:80>
	
	ServerName sele.test

	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html/sele

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
	
	<FilesMatch \.php> # Apache 2.4.10+ can proxy to unix socket 
        SetHandler "proxy:unix:/var/run/php/php8.0-fpm.sock|fcgi://localhost/" 
    </FilesMatch> 

</VirtualHost>
```
##### Enable site using
```bash
sudo a2ensite sele.conf
```
##### Reload apache service
```bash
systemctl reload apache2
```
##### Add following domain name to **hosts** file
```
127.0.1.1       sele.test
```
```bash
sudo vim /etc/hosts
```

### Login
default username : admin@sele.com
default password : password
