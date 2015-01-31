#!/bin/bash
rm top-1m.csv.zip
wget http://s3.amazonaws.com/alexa-static/top-1m.csv.zip
cat top-1m.csv | cut -d, -f2 | sed -r 's/\.[a-z\.]+$//' | awk ' !x[$0]++' > bigsites.txt
more bigsites.txt
