#!/bin/bash
now=$(date +"%B-%d-%Y-%A-%I%P")
DIR=/home/ubuntu
ec2PublicIP=54.254.244.166
#mkdir /opt/lampp/htdocs/daily_regression/results/$now

#cd athena-olxph/
started=$(date +"%H:%M:%S")
START_TIME=$SECONDS
$DIR/athena/athena php --php-version=7.1 api $DIR/athena-olxph $DIR/athena-olxph/athena.api-prod.json
finish=$(date +"%H:%M:%S")
ELAPSED_TIME=$(($SECONDS - $START_TIME))
mkdir /opt/lampp/htdocs/daily_regression/results/api/$now
sleep 10s
cp $DIR/athena-olxph/Reports/api/* /opt/lampp/htdocs/daily_regression/results/api/$now
mv /opt/lampp/htdocs/daily_regression/results/api/$now/report.html /opt/lampp/htdocs/daily_regression/results/api/$now/index.html

#clean-up test results images older than 60 days
find /opt/lampp/htdocs/daily_regression/results/ -type f -iname \*.jpg -mtime +60 -exec rm {} \;

passed=$(cat /opt/lampp/htdocs/daily_regression/results/api/$now/index.html | grep -Po 'Passed Tests[^<]*' | grep Passed | tr -d '\"'| sort -u)
failed=$(cat /opt/lampp/htdocs/daily_regression/results/api/$now/index.html | grep -Po 'Failed Tests[^<]*' | grep Failed | tr -d '\"')
link=http://$ec2PublicIP/daily_regression/results/api/$now/index.html

result=${passed}
result+=", "
result+=${failed}

if [ -z "$failed" ]
then
        color="#8BCD99"
        result_summary="All Passed"
else
        color="#D00000"
        result_summary="Failed"
fi

# ph-engineering-notifs and ph-test-notifs
# slack webhooks urls for API automated testing
slackWebhooks=('https://hooks.slack.com/services/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' 'https://hooks.slack.com/services/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')
#slackWebhooks=('https://hooks.slack.com/services/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')

for hooksUrl in "${slackWebhooks[@]}"; do
curl $hooksUrl \
-H "Accept: application/json" \
-H "Content-Type:application/json" \
--data @<(cat <<EOF
{
   "attachments":[
      {
         "fallback":"OLX OpenAPI Web Regression - ($now): <$link|Full Report> \nTest Started: $started \nTest Completed: $finish \nDuration: $(($ELAPSED_TIME/60)) min $(($ELAPSED_TIME%60)) sec",
         "pretext":"OLX OpenAPI Web Regression - ($now): <$link|Full Report> \nTest Started: $started \nTest Completed: $finish \nDuration: $(($ELAPSED_TIME/60)) min $(($ELAPSED_TIME%60)) sec",
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