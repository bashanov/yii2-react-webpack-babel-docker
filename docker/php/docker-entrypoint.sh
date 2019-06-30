#!/usr/bin/env bash

if [[ -z "${PHP_DIR_OWNER}" ]]; then
    OWNER=root:www-data
else
    OWNER=${PHP_DIR_OWNER}:www-data
fi

if [[ -z "${PHP_DIR_MODE}" ]]; then
    MODE=770
else
    MODE=${PHP_DIR_MODE}
fi

function check_and_create {
    DIR="/var/php/$1"
    if [[ ! -d "${DIR}" ]]; then
        mkdir -p ${DIR}
        chmod ${MODE} ${DIR}
        chown ${OWNER} ${DIR}
    fi
}

check_and_create tmp
check_and_create sessions
check_and_create upload
check_and_create log
check_and_create var/log/php

if [[ "$#" -ne 0 ]]; then
    exec "$@"
fi
