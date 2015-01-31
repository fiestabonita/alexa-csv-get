#!/bin/bash
rm top-1m.csv.zip
wget http://s3.amazonaws.com/alexa-static/top-1m.csv.zip
unzip top-1m.csv.zip

# cat pipes the csv to cut
# cut limits output to field 2, delimited by comma
# sed removes the .com, .eu, .co.jp, .net, etc. from each line
# awk removes duplicate lines
# > redirects output to bigsites.txt
cat top-1m.csv | cut -d, -f2 | sed -r 's/\.[a-z\.]+$//' | awk ' !x[$0]++' > bigsites.txt

more bigsites.txt
