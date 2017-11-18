//Week 08 Ponder
//Local HTTP server basic responses
//By Kylor Kersavage

var http = require('http');
var url = require('url');

var server = http.createServer(function(request, response) {
	console.log('got a request');
	if(request.url=='/home') {
		response.writeHead(200, {"Content-Type": "text/html"});
		response.write('<h1>Welcome to the Home Page</h1>');
		response.end();
	}
	else if(request.url=='/getData') {
		response.writeHead(200, {"Content-Type": "application/json"});
		var myClass = { name: "Kylor Kersavage", class: "CS313" };
		var json = JSON.stringify(myClass);
  		response.end(json);
	}
	else {
		response.writeHead(404, {"Content-Type": "text/html"});
		response.write('<h1>Page Not Found</h1>');
  		response.end(); 
  	}
  
		
});

server.listen(3000);