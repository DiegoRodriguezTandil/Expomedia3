var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

var app = express();
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(__dirname+'expomedia-cli/dist'));

console.log(__dirname+'/expomedia-cli/dist/');


/* ARCHIVOS */
app.get('/inline.bundle.js', function (req, res) {
    res.sendFile(path.join(__dirname,'/expomedia-cli/dist/inline.bundle.js'));
});

app.get('/styles.bundle.js', function (req, res) {
    res.sendFile(path.join(__dirname,'/expomedia-cli/dist/styles.bundle.js'));
});

app.get('/main.bundle.js', function (req, res) {
    res.sendFile(path.join(__dirname,'/expomedia-cli/dist/main.bundle.js'));
});

app.get('/*', function (req, res) {
/*
    // if the request is not html then move along
    var accept = req.accepts('html', 'json', 'xml');
    if(accept !== 'html'){
        next();
    }

    // if the request has a '.' assume that it's for a file, move along
    var ext = path.extname(req.path);
    if (ext !== ''){
        next();
    }
*/
    console.log(req.accepts('html', 'json', 'xml'));
    res.sendFile(path.join(__dirname,'/expomedia-cli/dist/index.html'));
});

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    var err = new Error('Not Found');
    err.status = 404;
    next(err);
});

app.listen(process.env.PORT, function () {
   console.log('Server listening on port '+process.env.PORT+' - Environment: '+process.env.NODE_ENV);
});

module.exports = app;