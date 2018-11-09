#!/bin/sh

echo "Run php unit tests"
vendor/bin/phpunit  test/

echo "start server"
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf