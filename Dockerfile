# Use the official PHP 8.1 image as the base image
FROM ubuntu:22.04

# Desabilita o cache do gerenciador de pacote
RUN echo "Acquire::http {No-Cache=True;};" > /etc/apt/apt.conf.d/no-cache

# Atualiza o repositório de pacotes e o SO
RUN apt-get update && \
  apt-get upgrade -y && \
  apt-get dist-upgrade -y && \
  apt-get autoremove -y

# Instala dependências
RUN apt-get install -y --no-install-recommends tzdata \
  software-properties-common \
  curl \
  zip \
  vim \
  wget

# Configura timezone do container para America/Sao_Paulo
ENV TZ America/Sao_Paulo
RUN echo $TZ > /etc/timezone && \
  cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
  dpkg-reconfigure -f noninteractive tzdata

RUN apt-get install -y --no-install-recommends \
  php8.1 \
  php8.1-bcmath \
  php8.1-bz2 \
  php8.1-cli \
  php8.1-common \
  php8.1-curl \
  php8.1-gd \
  php8.1-imagick \
  php8.1-interbase \
  php8.1-mbstring \
  php8.1-pgsql \
  php8.1-soap \
  php8.1-sqlite3 \
  php8.1-xml \
  php8.1-xmlrpc \
  php8.1-zip \
  php8.1-intl \
  php8.1-readline \
  php8.1-xdebug \
  php8.1-ldap \
  php8.1-ast \
  php8.1-dev

# Atualiza lista de repositórios
RUN apt-get update

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_21.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/html

CMD ["/bin/bash", "-c", "cp .env.example .env && npm install && composer install && php artisan key:generate && php artisan migrate && php artisan JWT:secret && php artisan serve --host=0.0.0.0 --port=8000"]
