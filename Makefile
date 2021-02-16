#!/usr/bin/make
# Makefile readme (ru): <http://linux.yaroslavl.ru/docs/prog/gnu_make_3-79_russian_manual.html>
# Makefile readme (en): <https://www.gnu.org/software/make/manual/html_node/index.html#SEC_Contents>

PLATFORM_CONTAINER_NAME := platform-php-cli

docker_bin := $(shell command -v docker 2> /dev/null)
docker_compose_bin := $(shell command -v docker-compose 2> /dev/null)

.DEFAULT_GOAL := help

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: ## Show this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build all containers and start (interact) for development
	$(docker_bin) image prune -a --force
	$(docker_compose_bin) up --build -d

platform-init: platform-key-generate \
	platform-migrate-fresh \
	platform-passport-install

platform-key-generate: ## Run "platform" key generate
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" php artisan key:generate

platform-migrate: ## Run "platform" migrate database
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" php artisan migrate

platform-migrate-fresh: ## Run "platform" migrate fresh database
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" php artisan migrate:fresh

platform-passport-install: ## Run "platform" migrate database
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" php artisan passport:install

platform-php-cli: ## Run "platform" php-cli bash
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" bash

platform-test: ## Execute "platform" application tests
	$(docker_compose_bin) exec "$(PLATFORM_CONTAINER_NAME)" ./vendor/bin/phpunit
