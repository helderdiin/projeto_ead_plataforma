var http = require('http');

/*

Example of an options configuration to connect to API of project.

var options = {
    protocol: 'http:',
    host: '127.0.0.1',
    port: '90',
    path: '/_empresa/api.php/services'
};
*/

var options = {};

http.get(options, function(response) {
    var str = '';

    response.on('data', function(chunk) {
        str += chunk;
    });
    
    response.on('end', function() {
        console.log(str);
    });
});