#!/bin/bash
USERNAME='root'
PASSWORD='root'
# persos

DBNAME='db_elycee_qpaf'
HOST='localhost'

USER_USERNAME='qpaf'
USER_PASSWORD='qpaf'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

php artisan migrate:refresh --seed

composer update

php artisan vendor:publish

php artisan route:cache





