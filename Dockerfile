FROM hitalos/php:latest
LABEL maintainer="Lanmor"

WORKDIR /var/www
CMD sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache
CMD php artisan serve --port=80 --host=0.0.0.0
EXPOSE 80
HEALTHCHECK --interval=1m CMD curl -f http://localhost/ || exit 1