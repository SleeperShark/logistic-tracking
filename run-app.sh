#!/usr/bin/env bash

COMPOSE_FILE=docker-compose-sre-task-5.yml

docker compose -f $COMPOSE_FILE build app

docker compose -f $COMPOSE_FILE up -d

docker compose -f $COMPOSE_FILE exec app rm -rf vendor composer.lock
docker compose -f $COMPOSE_FILE exec app composer install
docker compose -f $COMPOSE_FILE exec app php artisan key:generate
