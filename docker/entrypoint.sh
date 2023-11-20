#!/bin/sh

chmod -R o+w web/assets/
chmod -R o+w runtime
mkdir -p runtime/cache

php-fpm
