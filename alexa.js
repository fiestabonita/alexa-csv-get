/*
# Prerequisites install (ubuntu)
sudo apt-get install nodejs node-request npm
npm install unzip
npm install csv2
*/

var request = require('request');
var unzip   = require('unzip');
var csv2    = require('csv2');
var url     = 'http://s3.amazonaws.com/alexa-static/top-1m.csv.zip';
 
request.get(url).pipe(unzip.Parse()).on('entry', function (entry) {
        entry.pipe(csv2()).on('data', console.log);
    })
;
