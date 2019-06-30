FROM php:7.3-fpm

RUN bset --ex; \
    buildDeps=" \
            libssh2-1-dev \
            libzip-dev \
            libc-client-dev \
        "; \
    runtimeDeps=" \
            libssh2-1 \
            libzip4 \
            msmtp \
            git \
            apt-utils \
            unzip \
            libc-client2007e \
        "; \
    apt-get update; \
	DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends $buildDeps $runtimeDeps; \
	rm -r /var/lib/apt/lists/*; \
	ln -s /usr/bin/msmtp /usr/sbin/sendmail; \
	pecl install ssh2-alpha; \
	docker-php-ext-install mysqli pdo_mysql zip; \
	docker-php-ext-enable ssh2; \
	apt-get purge -y --auto-remove $buildDeps;

ENV COMPOSER_ALLOW_SUPERUSER=1 COMPOSER_HOME=/tmp/.composer RUN_USER=root

COPY . /tmp/build/

# See https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md
RUN set -ex; \
     curl -fso composer-setup.php 'https://getcomposer.org/installer'; \
     curl -fs 'https://composer.github.io/installer.sha384sum' | sha384sum -c -; \
     php composer-setup.php --quiet --no-ansi --install-dir=/usr/local/bin --filename=composer; \
     mv /tmp/build/conf/custom.ini ${PHP_INI_DIR}/conf.d; \
     mv /tmp/build/docker-entrypoint.sh /opt; \
     rm composer-setup.php;

# nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - ; \
    apt-get install -y nodejs;

WORKDIR /var/www

ENTRYPOINT ["/opt/docker-entrypoint.sh"]

CMD ["php-fpm"]
