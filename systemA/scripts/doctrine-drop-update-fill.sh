#!/bin/bash

bin/console doctrine:schema:drop --force
bin/console doctrine:schema:update --force
#bin/console hautelook:fixtures:load --no-bundles --no-interaction -vvv
