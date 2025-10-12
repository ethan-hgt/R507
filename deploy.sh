#!/bin/bash
set -e

echo "Setting up production environment..."

# Copy production env file
cp .env.prod .env

# Clean up development files FIRST
rm -rf tests/ .env.local .env.test .env.dev
rm -rf var/cache/dev var/cache/test
rm -rf src/DataFixtures/

# Create necessary directories
mkdir -p var/cache var/log public/bundles
touch var/data.db
chmod -R 777 var/

# Clear cache manually without auto-scripts
rm -rf var/cache/*

# Warmup cache for production
APP_ENV=prod php bin/console cache:clear --no-debug
APP_ENV=prod php bin/console cache:warmup --no-debug

# Run migrations
APP_ENV=prod php bin/console doctrine:migrations:migrate --no-interaction

# Install assets manually if needed
if [ -f "bin/console" ]; then
    APP_ENV=prod php bin/console assets:install public --no-debug || true
fi

# Clean up development files
rm -rf src/DataFixtures/

echo "Production setup completed!"
