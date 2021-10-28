# Блог "Laravel From Scratch"

> Оригинальный репозиторий: https://github.com/JeffreyWay/Laravel-From-Scratch-Blog-Project (http://laravelfromscratch.com)

## Разворачивание проекта

Скопируйте файл `.env.example` в `.env`, после чего выполните команды:

```shell
docker-compose run --rm php composer install
docker-compose run --rm php php artisan key:generate
```

После этого проект готов к запуску:

```shell
docker-compose up
```

Чтобы накатить миграции:
```shell
docker-compose exec php php artisan migrate --seed # На запущенном стеке
```

В браузере перейдите по ссылке: http://127.0.0.1:8000
