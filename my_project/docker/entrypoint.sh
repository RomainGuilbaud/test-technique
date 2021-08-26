#!/usr/bin/env bash

composer install -n
bin/console doc:mig:mig --no-interaction
bin/console app:update-password-user

exec "$@"