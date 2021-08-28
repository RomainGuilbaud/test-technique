#!/usr/bin/env bash

composer install -n
php bin/console doctrine:migrations:migrate
php bin/console app:update-password-user

exec "$@"