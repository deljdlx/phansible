#!/bin/sh

php -r "copy('http://www.phing.info/get/phing-latest.phar', 'phing-latest.phar');"
mv phing-latest.phar /usr/bin/phing
chmod +x /usr/bin/phing

RESULT=$?
exit $RESULT