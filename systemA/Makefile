#!/bin/bash

UID = $(shell id -u)
DOCKER_BE = systemA-be

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo 'targets:'
	@grep -E '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

build: ## Rebuilds all the containers
	userid=${UID} docker-compose build

up: ## Up the containers
	userid=${UID} docker-compose up -d

stop: ## Stop the containers
	userid=${UID} docker-compose stop

rebuild: ## Restart the containers
	$(MAKE) stop && $(MAKE) build

bash: ## bash into the be container
	userid=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bash

logs: ## Show Symfony logs in real time
	userid=${UID} docker exec -it --user ${UID} ${DOCKER_BE} symfony server:log

install: ## Installs composer dependencies
	userid=${UID} docker exec --user ${UID} ${DOCKER_BE} composer install --no-interaction
	userid=${UID} docker exec --user ${UID} ${DOCKER_BE} ./scripts/doctrine-drop-update-fill.sh

db-update: ## Installs composer dependencies
	userid=${UID} docker exec --user ${UID} ${DOCKER_BE} ./scripts/doctrine-drop-update-fill.sh
