FROM php:8.1-apache

# Installer les extensions PHP nécessaires (ajoutez d'autres si nécessaire)
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Activer mod_rewrite d'Apache
RUN a2enmod rewrite

# Copier le fichier de configuration personnalisé (si nécessaire)
# COPY my-apache-config.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
