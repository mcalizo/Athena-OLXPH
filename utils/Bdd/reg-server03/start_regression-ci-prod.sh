#!/bin/bash
now=$(date +"%B-%d-%Y-%A-%I%P")
HOME_DIR=/home/ubuntu
# Feature names and tags
features=TopUp-VasRefresh-AdBoostingPackage
featuretags=@TopUp,@VasRefresh,@AdBoostingPackage
ec2PublicIP=54.169.24.181
seleniumVersion=$(<$HOME_DIR/athena-olxph/utils/seleniumVersion.txt)
parallelism=3

#start selenium hub and chrome nodes
$HOME_DIR/athena/athena selenium start hub $seleniumVersion
$HOME_DIR/athena/athena selenium start chrome-debug $seleniumVersion --env DBUS_SESSION_BUS_ADDRESS=/dev/null -v /dev/shm:/dev/shm -t -d -P --instances=$parallelism
sleep 10s

#copy images for testing sellform
sudo docker cp imgs/playstation.jpeg athena-selenium-0-chrome-debug:/tmp/playstation.jpeg
sudo docker cp imgs/playstation2.jpeg athena-selenium-0-chrome-debug:/tmp/playstation2.jpeg
sudo docker cp imgs/playstation.jpeg athena-selenium-0-chrome-debug-1:/tmp/playstation.jpeg
sudo docker cp imgs/playstation2.jpeg athena-selenium-0-chrome-debug-1:/tmp/playstation2.jpeg

#run bdd feature tests
$HOME_DIR/athena/athena php --php-version=7.1 bdd . athena.bdd.ci-production.json --browser=chrome --tags=$featuretags --parallel-process=$parallelism --parallel-features=$parallelism --athena-no-logo --no-colors --rerun
sleep 30s
#rename to json file for cucumber reporting
sudo mv Reports/ci/report.cucumber Reports/ci/cucumber-json-report.json

#stop selenium container
$HOME_DIR/athena/athena selenium stop chrome-debug || true
$HOME_DIR/athena/athena selenium stop hub || true