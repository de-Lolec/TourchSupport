# TourchSupport

## Технологии
- Laravel
- Livewire
- Filament
- Tailwind
- Flask
- Pandas
- Picle
- Sklearn
- Sail (docker)

## Описание
Веб-приложение TourchSupport позволяет операторам улучишить работу с заявками

## Требования для бэкенда
| Требования                                                                                             | Выполнено или нет | 
|--------------------------------------------------------------------------------------------------------|:-----------------:|
| 1. Использование база данных (любой), необходимо предоставить доступ, для оценки структуры базы данных |         ✅         |
| 2. Создание административной панели для вывода и работы с заявками                                     |         ✅         |
| 3. Вывод аналитической статистики в удобном виде                                                       |         ✅         |
| 4. Сервис должен работать стабильно, без неожиданных падений                                           |         ✅         |

## Требования для фронтенда
| Требования                                                   | Выполнено или нет | 
|--------------------------------------------------------------|:-----------------:|
| 1. Создание интерфейса сайта с заявкой для обращение         |         ✅         |
| 2. Правильное проектирование проекта                         |         ✅         |
| 3. Адаптивность под разные устройства                        |         ✅         |
| 4. Сервис должен работать стабильно |         ✅         |


### Требование к продукту после прохождения статуса MVP
| Требования                                                    | Выполнено или нет | 
|---------------------------------------------------------------|:-----------------:|
| 1. Возможность регистрации, авторизации в сервисе             |         ✅         |
| 2. Обучение модели для увеличения точности текста             |         ✅         |
| 3. Машинно зрение для обработки вложений к обращением         |         ✅         |
| 4. Мониторинг для большей статистики в административной части |         ✅        |
| 5. Чат с сотрудником                                          |         ✅         |

## Инструкция по установке
Для проекта потребуется установить [composer](https://getcomposer.org/) и
[docker](https://docs.docker.com/engine/install/) + [docker-compose](https://docs.docker.com/compose/install/linux/)

### Подготовка к запуску

#### создайте env с этами параметрами

```yaml
<...>
environment:
    APP_NAME=TourchSupport
    APP_ENV=local
    APP_KEY=base64:geqzouj/PfiMTS3NSuEi5+wSYwDC4LMQ1LmTutzpJ9g=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=pgsql
    DB_HOST=pgsql
    DB_PORT=5432
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=password

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=photos
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=redis
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1

    VITE_APP_NAME="${APP_NAME}"
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


```

#### Запуск окружения и проекта.
```bash
composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan db:seed

./vendor/bin/sail npm run dev
```

### Доступ локально к приложению

Перейти - [Фронт с созданием заявкой](http://localhost)

Перейти - [Админка с заявкой](http://localhost/admin)

Создание пользователя для админ панели - ```./vendor/bin/sail artisan make:filament-user```

### Доступ на сервере к приложению

Перейти - [Сайт на проде](http://79.174.95.30/)
