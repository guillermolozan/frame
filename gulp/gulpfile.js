/*
cd frames
http-server .
sudo npm i -D gulp   

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request gulp-jade-php

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request browserify babelify vinyl-source-stream gulp-uglify

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request babelify@6.1.3 gulp-uglify vinyl-source-stream

gulp -p rinconcito|mconsultores
gulp json -p rinconcito|mconsultores
gulp deploy -p rinconcito|mconsultores -f css|img|js|vendor|public|controllers|views|config|work
gulp tutorial
*/

// gulp
const gulp         = require('gulp'),
      argv         = require('yargs').default('p','model').argv,
      gutil        = require('gulp-util');

// stylus
const stylus       = require('gulp-stylus'),
      autoprefixer = require('gulp-autoprefixer'),
      livereload   = require('gulp-livereload');

// touch
const  writeFile   = require('write');

// browserify;
const browserify   = require('browserify'),
      babelify     = require('babelify'),
      uglify       = require('gulp-uglify'),

      source       = require('vinyl-source-stream'),
      buffer       = require('vinyl-buffer'); 

const exec         = require('child_process').exec;

const inlineCss    = require('gulp-inline-css');

const request      = require('request');

const ftp          = require('vinyl-ftp');

//  const   watch        = require('gulp-watch'),
//     jade         = require('gulp-jade'),
//     babel        = require('gulp-babel'),
//     sourcemaps   = require('gulp-sourcemaps'),


//     data         = require('gulp-data'),
//     path         = require('path'),
//     wait         = require('gulp-wait'),
//     // curl         = require('node-curl'),
//     http         = require('http'),
//     st           = require('st'),
    
//     // jade_php     = require('gulp-jade-for-php'),



// gulp.env has been deprecated. Use your own CLI parser instead. We recommend using yargs or minimist. 

const folder           = '../'+argv.p;
const app              = './'+folder;
const work             = './work';
const urlfolder        = 'http://localhost/frame/' + argv.p;

const comp_dir         = app+'/app/sources/components';

const stylus_dir       = app+'/app/sources/stylus';
const es6_dir          = app+'/app/sources/es6';

const jade_dir         = app+'/app/sources/jade';

const views_dir        = app+'/app/views';
const html_dir         = app+'/html';
const json_dir         = app+'/json';

const public_dir       = app+'/public';

const work_jade_dir    = work+'/sources/jade';
const work_stylus_dir  = work+'/sources/stylus';

const depl             = argv.d || 'no live';
const clean            = argv.c || '';

const activelivedeploy = (depl == 'live')?true:false;

// console.log(depl);

gutil.log(gutil.colors.bgRed(" DEVELOPMENT" + ( (activelivedeploy)?" AND DEPLOY":"")+" "));
// gutil.beep();

var varjson;


var dconn = require(app+'/conn.json');
dconn.log = gutil.log;


// console.log(dconn.host);
// console.log(dconn.remotedir);
// console.log('burbuja');

var remotedir=dconn.remotedir || '/public_html';

var livedeploy= function(file){

    // console.log(dconn);
    if (typeof(conn) == "undefined")
      conn = ftp.create(dconn);

    // remotedir = dconn.remotedir || '/public_html';
    console.log(file);

    return gulp.src([file],{base:'.',buffer:false})
      .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));

}












// Stylus
gulp.task('stylus', () => {
  

  gulp.src(stylus_dir+'/app.styl')
    .pipe(stylus({
      'include css': true,
      'compress': true
    }))
    .pipe(autoprefixer()) 
    .pipe(gulp.dest(public_dir+'/css'))
    .pipe(livereload());


});




// Touch
gulp.task('touch', () => {

  var filetouch = app+'/touch.json';
  var touch=require(filetouch);
  var newtouch = ++touch.v;
  console.log("v:"+newtouch);
  writeFile.sync(filetouch, '{"v":"'+newtouch+'"}');

});











// // Babel
// gulp.task('babel', () => {
//   gulp.src(es6_dir+'/*.js')
//     .pipe(babel())
//     .pipe(uglify())    
//     .pipe(gulp.dest(public_dir+'/js'))
//     .pipe(livereload());    
// });





// Browserify
gulp.task('browserify', () => {
    browserify({
      entries: es6_dir+'/app.js', 
    })
    .transform("babelify")
    .bundle()
    .pipe(source('app.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest(public_dir+'/js'))
    .pipe(livereload());

});



// // Jade2Html
// gulp.task('jade2html',['json'], () => {

//   var layouts=[];
//   var i=0;
//   for (var key in varjson) {
//     layouts[i++]=jade_dir+'/'+key+'.jade';
//   }
//   console.log(layouts);
//   gulp.src(layouts)
//     .pipe(data(function(file) {
//       var items = path.basename(file.path).split('.jade');
//       return varjson[items[0]];
//     }))
//     .pipe(jade({
//       'pretty': true,
//     })) 

//     .pipe(gulp.dest(html_dir))
//     .pipe(wait(900))    
//     .pipe(livereload());
    
// });


gulp.task('email_inline', function() {
    return gulp.src(folder+'/app/views/php/email_*.php')
      .pipe(inlineCss({
          applyStyleTags : true,
          applyLinkTags  : true,
          removeStyleTags: true,
          removeLinkTags : true
      }))
      .pipe(gulp.dest(folder+'/app/views/php/inline/'));
});







// Jade2PHP
gulp.task('jade2php', () => {

  const command = 'jade2php --pretty --omit-php-runtime --omit-php-extractor  ' + folder + '/app/sources/jade/layout*.jade ' + folder + '/app/sources/jade/email*.jade --out ' + folder + '/app/views/php';
  console.log(command);
  exec(command, function(err, stdout, stderr) {
    // console.log(stdout);
    console.log(stderr);
  });

});



// var gulpJade = require('gulp-jade');
// var jadePhpTwig = require('jade-php-twig');
// gulp.task('jade', function () {
//   return gulp.src(folder +'/app/sources/jade/layout_home.jade')
//     .pipe(gulpJade({
//       jade: jadePhpTwig(),
//       pretty: true
//     }))
//     .pipe(gulp.dest(folder + '/app/views/php'))
// })




const modifies = [     

  app+'/config/**',   
    
  app+'/public/css/app.css',   
  app+'/public/js/app.js',  
  app+'/public/img/**',   
  app+'/public/vendor/**/*.+(css|js)',

  app+'/app/controllers/**/*.php',   
  app+'/app/views/php/**/*.php',
  app+'/app/config/*.php',
  app+'/app/config/**/*.php',
  // app+'/app/config/**/*.json',

  app+'/.htaccess',
  app+'/index.php',
  app+'/touch.json',


  './work/core/**/*.php',
  './work/data_test/**/*.php',
  './work/library/**/*.php',
  './work/vendor/**/*.+(css|js|php)',
  '.htaccess'

];


const external_stylus = require(stylus_dir + '/externals/external.json');
const external_jade = require(jade_dir + '/externals/external.json');
const external_es6 = require(es6_dir + '/externals/external.json');


// Watch
gulp.task('watch',[
  'stylus',
  'browserify',
  'jade2php',
  'email_inline',
  ], () => {
  
  livereload.listen();  
  
  // console.log(comp_dir+'/**/*.styl');



  //watch styl
  gulp.watch([
    comp_dir+'/**/*.styl',
    stylus_dir+'/*.styl',
    stylus_dir+'/**/*.styl',
    work_stylus_dir+'/**/*.styl',
    external_stylus
    ], 
    [
      'stylus',
      'touch',
    ]
  );



  //watch browserify
  gulp.watch([
    comp_dir+'/**/*.js',
    es6_dir+'/**/*.js',
    external_es6    
    ], 
    [
      'browserify',
      'touch',
    ]
  );



  //watch jade2html and jade2php
  gulp.watch([
    comp_dir+'/**/*.jade',
    work_jade_dir+'/**/*.jade',
    jade_dir+'/**/*.jade',
    external_jade
    ], 
    [
      'jade2php',
      'email_inline',
    ]
  );

  


  if(activelivedeploy)
    gulp.watch(modifies, function(event){
      livedeploy(event.path)
    });


});






// Default
gulp.task('default',
  [
    'watch'
  ]
);







//Deploy
gulp.task('deploy',() => {
  
    const dconn = require(app+'/conn.json');
    dconn.log = gutil.log;

    const remotedir = dconn.remotedir || '/public_html';

    const conn = ftp.create(dconn);

    const globspc = [     
        app+'/public/css/app.css',
        app+'/touch.json',
    ];
    const globspi = [     
        app+'/public/img/**',
    ];
    const globspj = [     
        app+'/public/js/app.js',
        app+'/touch.json',
    ]; 
    const globspv = [     
        app+'/public/font/**',
        app+'/public/vendor/**',
    ];            
    const globsc = [     
        app+'/app/controllers/**',
        app+'/app/models/**',
    ];
    const globsv = [     
        app+'/app/views/php/**',
    ];    
    const globs2 = [
        app+'/app/config/**',        
        // app+'/vendor/**',
        app+'/.htaccess',
        app+'/touch.json',
        app+'/index.php',
    ];

    const globs3 = [
        './work/core/**',
        './work/data_test/**',
        './work/library/**',
        './work/vendor/**',
        './work/public/**',
        '.htaccess',
    ];

    const globs4 = [
        'index.php',
    ];    

    const indextxt="<?php chdir('"+folder+"'); include 'index.php';"

    globs=[];
    if(argv.f=='css'){
      globs=globspc;
    } else if(argv.f=='img'){
      globs=globspi;
    } else if(argv.f=='js'){
      globs=globspj;
    } else if(argv.f=='vendor'){
      globs=globspv;    
    } else if(argv.f=='public'){
      globs=globspc.concat(globspi).concat(globspj).concat(globspv)
    } else if(argv.f=='controllers'){
      globs=globsc;
    } else if(argv.f=='views'){
      globs=globsv;      
    } else if(argv.f=='config') {
      globs=globs2;
    } else if(argv.f=='work') {
      globs=globs3;
    } else if(argv.f=='index') {
      writeFile.sync('index.php', indextxt);
      globs=globs4;
    } else if(argv.f=='install') {
      writeFile.sync('index.php', indextxt);
      globs=globspc.concat(globs4).concat(globspi).concat(globspj).concat(globspv).concat(globsc).concat(globsv).concat(globs2).concat(globs3);
    } else {
      globs=globspc.concat(globspi).concat(globspj).concat(globspv).concat(globsc).concat(globsv).concat(globs2).concat(globs3);
    }


    // using base = '.' will transfer everything to /public_html correctly 
    // turn off buffering in gulp.src for best performance 
 
    return gulp.src(globs,{base:'.',buffer:false})
      .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));

});


// Generate Jsons for development
gulp.task('components',() => {

  const geturl = urlfolder+'/runtime/start/'+clean;
  console.log(geturl);
  console.log('task components');
  request(geturl, function(error, response, body) {
    // console.log("error:", error); // Print the error if one occurred
    // console.log("statusCode:", response && response.statusCode); // Print the response status code if a response was received
    console.log("body:", body); // Print the HTML for the Google homepage.
  });  
  // request(geturl);    

});



module.exports = gulp