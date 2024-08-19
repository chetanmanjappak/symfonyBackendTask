FROM php:8.1-cli

# Install cron
RUN apt-get update && apt-get install -y cron

# Copy application files
COPY . /app
WORKDIR /app

# Install PHP extensions if needed
RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev zip unzip && \
    docker-php-ext-install pdo pdo_mysql

# Copy cron file to the correct location
COPY cron/process-scan /etc/cron.d/process-scan
RUN chmod 0644 /etc/cron.d/process-scan && \
    crontab /etc/cron.d/process-scan

# Start cron service
CMD ["cron", "-f"]
