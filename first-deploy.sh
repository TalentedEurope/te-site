user=`whoami`
BASENAME=$(basename $PWD)
DOMAIN="talentedeurope.eu"

#Set up Nginx/FPM settings files on the correct places
sudo ln -s "${PWD}/.vhost" /etc/nginx/sites-available/${BASENAME}
sudo ln -s /etc/nginx/sites-available/${BASENAME} /etc/nginx/sites-enabled/${BASENAME}
sudo ln -s "${PWD}/.fpm" /etc/php/7.0/fpm/pool.d/${BASENAME}.conf

#Setup nginx.
sudo sed -i "s/# server_names_hash_bucket_size.*/server_names_hash_bucket_size 64;/" /etc/nginx/nginx.conf
sed -i "s/site1/${BASENAME}/" .vhost
sed -i "s/deploydomain/${DOMAIN}/" .vhost
sed -i "s~pwd~${PWD}~" .vhost

#Setup FPM
sed -i "s/site1/${BASENAME}/" .fpm
sed -i "s/user1/${user}/" .fpm

sudo rm /etc/nginx/sites-available/default
sudo rm /etc/nginx/sites-enabled/default

sudo service nginx restart
sudo service php7.0-fpm restart

# Running composer
composer install

# Run lets encrypt to secure the server
sudo letsencrypt certonly --webroot -w ${PWD}/public -d ${DOMAIN}
