## Запуск проекта

1. В корне проекта необходимо запустить команду: docker-compose up --build (первый раз)

Последующие разы запускаем команду docker-compose up

2. Необходимо зайти в контейнер с приложением:  

docker exec -ti -u root slim4-skeleton_webserver_1 bash

3. Перейти в директорию: /var/www/html

4. php bin/console example

5.  Приятной игры



