FROM phpswoole/swoole:php8.3-alpine

RUN docker-php-ext-install pcntl

RUN apk add npm

WORKDIR /app

COPY . /app
RUN composer install -o

RUN npm install --save-dev chokidar

EXPOSE 8000

# hot reload
ENTRYPOINT ["php", "artisan", "octane:start", "--host=0.0.0.0", "--watch"]
