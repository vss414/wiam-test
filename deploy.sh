docker-compose up -d

sleep 5

docker exec wiam-test_php-fpm_1 php yii migrate --interactive=0