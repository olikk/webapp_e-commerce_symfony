
sudo mv /etc/apache2/envvars /etc/apache2/envvars.bak
sudo apt-get remove libapache2-mod-php7.1 -y
sudo apt-get install libapache2-mod-php7.2 -y
sudo cp /etc/apache2/envvars.bak /etc/apache2/envvars

sudo a2dismod php7.1
sudo a2enmod php7.2
sudo service apache2 restart
