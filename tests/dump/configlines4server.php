
<VirtualHost *:80>
ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/band-aid2.0/public
    <Directory /var/www/html/band-aid2.0/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
<IfModule mod_dir.c>
DirectoryIndex index.php index.pl index.cgi index.html index.xhtml index.htm
</IfModule>
</VirtualHost>


#<VirtualHost *:80>
    #    ServerAdmin webmaster@localhost
    #    ServerName band-aid
    #    ServerAlias www.band-aid
    #    DocumentRoot /var/www/band-aid
    #    ErrorLog ${APACHE_LOG_DIR}/error.log
    #    CustomLog ${APACHE_LOG_DIR}/access.log combined
    #</VirtualHost>
