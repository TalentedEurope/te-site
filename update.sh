read -p "Are you sure? " -n 1 -r
echo    # (optional) move to a new line
if [[ $REPLY =~ ^[Yy]$ ]]
then
    git reset --hard
    git pull
    rm .vhost
    rm .fpm
    rm -r ~/te-site/app
    rm -r ~/te-site/resources
    rsync -h -v -r -P -t ./ ~/te-site/
    rm ~/te-site/update.sh
    rm ~/te-site/first-deploy.sh
    gulp --production --cwd ~/te-site/
fi
