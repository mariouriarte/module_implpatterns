#!/bin/bash

UID = $(shell id -u)
DOCKER_BE = systemA-be

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo 'targets:'
	@grep -E '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

build: ## Rebuilds all the containers
	docker-compose build

up: ## Up the containers
	docker-compose up -d

stop: ## Stop the containers
	docker-compose stop

rebuild: ## Restart the containers
	$(MAKE) stop && $(MAKE) build

bash: ## bash into the be container
	docker exec -it ${DOCKER_BE} bash

logs: ## Show Symfony logs in real time
	docker exec -it ${DOCKER_BE} symfony server:log

install: ## Installs composer dependencies
	docker exec ${DOCKER_BE} composer install --no-interaction
	docker exec ${DOCKER_BE} ./scripts/doctrine-drop-update-fill.sh

db-update: ## Installs composer dependencies
	docker exec ${DOCKER_BE} ./scripts/doctrine-drop-update-fill.sh
