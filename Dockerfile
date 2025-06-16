FROM php:8.4-cli

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install zip

# Installer Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /app

# Exposer le port pour le serveur de développement Laravel
EXPOSE 8000

# Commande par défaut
CMD ["bash"]
