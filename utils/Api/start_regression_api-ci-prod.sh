#!/bin/bash
HOME_DIR=/home/ubuntu
$HOME_DIR/athena/athena php --php-version=7.1 api . athena.api-prod.json
sleep 30s
sudo mv Reports/api/report.html Reports/api/index.html