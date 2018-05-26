/*
cd frames
http-server .
sudo npm i -D gulp              
sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css
sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css curl-request
sudo npm i -D curl-request
sudo npm i -D node-libcurl --build-from-source

gulp -p rinconcito|mconsultores
gulp json -p rinconcito|mconsultores
gulp deploy -p rinconcito|mconsultores -f css|img|js|vendor|public|controllers|views|config|work
gulp tutorial
*/




var gulp = require('gulp');
   // curl = require('node-curl'),
var request = require('request');

// var download = require("gulp-download-stream");



// Generate Jsons for development
gulp.task('get', function () {

   var geturl = 'http://localhost/frame/prot.php';
   console.log(geturl);
   console.log(request(geturl));
   // console.log(request(geturl));


});



module.exports = gulp
