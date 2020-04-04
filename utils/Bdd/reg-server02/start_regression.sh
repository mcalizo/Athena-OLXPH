#!/bin/bash
now=$(date +"%B-%d-%Y-%A-%I%P")
DIR=/home/ubuntu
# Feature names and tags
features=Login-Registration-CategoryLinks
featuretags=@login,@registration,@categorylink
ec2PublicIP=13.229.63.55
seleniumVersion=$(<$DIR/athena-olxph/utils/seleniumVersion.txt)
parallelism=4

#start selenium hub and chrome nodes
$DIR/athena/athena selenium start hub $seleniumVersion
$DIR/athena/athena selenium start chrome-debug $seleniumVersion --env DBUS_SESSION_BUS_ADDRESS=/dev/null -v /dev/shm:/dev/shm -t -d -P --instances=$parallelism
sleep 10s

docker cp $DIR/athena-olxph/imgs/playstation.jpeg athena-selenium-0-chrome-debug:/tmp/playstation.jpeg
docker cp $DIR/athena-olxph/imgs/playstation2.jpeg athena-selenium-0-chrome-debug:/tmp/playstation2.jpeg
docker cp $DIR/athena-olxph/imgs/playstation.jpeg athena-selenium-0-chrome-debug-1:/tmp/playstation.jpeg
docker cp $DIR/athena-olxph/imgs/playstation2.jpeg athena-selenium-0-chrome-debug-1:/tmp/playstation2.jpeg

cd athena-olxph/
started=$(date +"%H:%M:%S")
START_TIME=$SECONDS
$DIR/athena/athena php --php-version=7.1 bdd $DIR/athena-olxph $DIR/athena-olxph/athena.bdd.prod.json --browser=chrome --tags=$featuretags --parallel-process=$parallelism --parallel-features=$parallelism --athena-no-logo --no-colors --rerun
#$DIR/athena/athena php --php-version=7.1 bdd $DIR/athena-olxph $DIR/athena-olxph/athena.bdd.prod.json --browser=chrome --tags=@adsenselisting --parallel-process=2 --parallel-features=2 --athena-no-logo
finish=$(date +"%H:%M:%S")
ELAPSED_TIME=$(($SECONDS - $START_TIME))
mkdir /opt/lampp/htdocs/daily_regression/results/$now-$features

sleep 10s
cp $DIR/athena-olxph/Reports/bdd/* /opt/lampp/htdocs/daily_regression/results/$now-$features
mv /opt/lampp/htdocs/daily_regression/results/$now-$features/report.html /opt/lampp/htdocs/daily_regression/results/$now-$features/index.html

#clean-up test results images older than 2 days
sudo find /opt/lampp/htdocs/daily_regression/results/ -type f -iname \*.jpg -mtime +2 -exec rm {} \;

result=$(cat /opt/lampp/htdocs/daily_regression/results/$now-$features/index.html | grep -Po '<small>\K[^<]*scenarios[^<]*')
failed=$(cat /opt/lampp/htdocs/daily_regression/results/$now-$features/index.html | grep -Po '<small>\K[^<]*scenarios[^<]*' | grep failed)
link=http://$ec2PublicIP/daily_regression/results/$now-$features/index.html

$DIR/athena/athena selenium stop chrome-debug || true
$DIR/athena/athena selenium stop hub || true

if [ -z "$failed" ]
then
        color="#8BCD99"
        result_summary="All Passed"
else
        color="#D00000"
        result_summary="Failed"
fi

# ph-engineering-notifs and ph-test-notifs
# slack webhooks urls for WEB automated testing
slackWebhooks=('https://hooks.slack.com/services/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' 'https://hooks.slack.com/services/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')

for hooksUrl in "${slackWebhooks[@]}"; do
curl $hooksUrl \
-H "Accept: application/json" \
-H "Content-Type:application/json" \
--data @<(cat <<EOF
{
   "attachments":[
      {
         "fallback":"OLX $features Web Regression - ($now): <$link|Full Report> \nTest Started: $started \nTest Completed: $finish \nDuration: $(($ELAPSED_TIME/60)) min $(($ELAPSED_TIME%60)) sec",
         "pretext":"OLX $features Web Regression - ($now): <$link|Full Report> \nTest Started: $started \nTest Completed: $finish \nDuration: $(($ELAPSED_TIME/60)) min $(($ELAPSED_TIME%60)) sec",
         "color":"$color",
         "fields":[
            {
               "title":"$result_summary",
               "value":"$result",
               "short":false
            }
         ]
      }
   ]
}
EOF
)
done
