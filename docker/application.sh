#!/bin/bash
/bin/bash /usr/local/bin/importdb.sh
service php7.4-fpm start && nginx -g "daemon off;"
tail -f /dev/null