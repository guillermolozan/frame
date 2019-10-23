/*
cd frames
http-server .
sudo npm i -D gulp   

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request

sudo npm i -D vinyl-buffer http st path gulp-wait gulp-exec write vinyl-ftp gulp-util yargs gulp-data gulp-stylus gulp-jade gulp-watch gulp-autoprefixer gulp-sourcemaps gulp-livereload gulp-jade-php gulp-babel babel-core babel-preset-env gulp-inline-css request gulp-jade-php

gulp -p rinconcito|mconsultores
gulp json -p rinconcito|mconsultores
gulp deploy -p rinconcito|mconsultores -f css|img|js|vendor|public|controllers|views|config|work
gulp tutorial
*/


const gulp         = require('gulp'),
    
    browserify   = require('browserify'),
    babelify     = require('babelify'),
    source       = require('vinyl-source-stream'),
    uglify       = require('gulp-uglify'),

    watch        = require('gulp-watch'),
    jade         = require('gulp-jade'),
    stylus       = require('gulp-stylus'),
    babel        = require('gulp-babel'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps   = require('gulp-sourcemaps'),
    livereload   = require('gulp-livereload'),

    argv         = require('yargs').default('p','model').argv,

    data         = require('gulp-data'),
    gutil        = require('gulp-util'),
    ftp          = require('vinyl-ftp'),
    exec         = require('child_process').exec,
    path         = require('path'),
    wait         = require('gulp-wait'),
    // curl         = require('node-curl'),
    request      = require('request'),
    http         = require('http'),
    st           = require('st'),
    buffer       = require('vinyl-buffer'),     
    writeFile    = require('write'),
    
    // jade_php     = require('gulp-jade-for-php'),

    inlineCss    = require('gulp-inline-css');


// gulp.env has been deprecated. Use your own CLI parser instead. We recommend using yargs or minimist. 

const folder     = argv.p;
const app        = './'+folder;
const work       = './work';

const comp_dir   = app+'/app/sources/components';

const stylus_dir = app+'/app/sources/stylus';
const es6_dir    = app+'/app/sources/es6';

const jade_dir   = app+'/app/sources/jade';

const views_dir  = app+'/app/views';
const html_dir   = app+'/html';
const json_dir   = app+'/json';

const public_dir = app+'/public';

const work_jade_dir   = work+'/sources/jade';
const work_stylus_dir = work+'/sources/stylus';

const depl = argv.d || 'no live';
const clean = argv.c || '';

const activelivedeploy = (depl=='live')?true:false;

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
      // .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));

}










// Jade Tutorial
gulp.task('tutorial', () => {
  gulp.src('tutorial.jade')
    .pipe(jade({'pretty': true}))
    .pipe(gulp.dest('./'))
});


// Stylus
gulp.task('stylus', () => {
  

  gulp.src(stylus_dir+'/app.styl')
    // .pipe(sourcemaps.init())
    .pipe(stylus({
      'include css': true,
      'compress': true
      // 'sourcemap':true
    }))
    .pipe(autoprefixer()) 
    // .pipe(sourcemaps.write('.'))
    // .pipe(sourcemaps.write('.',{includeContent: false, sourceRoot: stylus_dir}))
    .pipe(gulp.dest(public_dir+'/css'))
    .pipe(livereload());

  // var filetouch = app+'/touch.json';
  // var touch=require(filetouch);
  // var newtouch = ++touch.v;
  // console.log("v:"+newtouch);
  // writeFile.sync(filetouch, '{"v":"'+newtouch+'"}');

});



gulp.task('touch', () => {

  // var touch0=require(app+'/touch.txt');
  // console.log(touch0);
  var filetouch = app+'/touch.json';
  var touch=require(filetouch);
  var newtouch = ++touch.v;
  console.log("v:"+newtouch);
  writeFile.sync(filetouch, '{"v":"'+newtouch+'"}');

});











// Babel
gulp.task('babel', () => {
  gulp.src(es6_dir+'/*.js')
    .pipe(babel())
    .pipe(uglify())    
    .pipe(gulp.dest(public_dir+'/js'))
    .pipe(livereload());    
});





// Browserify
gulp.task('browserify', () => {
    browserify({
      entries: es6_dir+'/app.js',
      // shim: {
      //     jQuery: {
      //         path: "./node_modules/jquery/dist/jquery.min.js",
      //         exports: '$'
      //     },
      //     materialize: {
      //         path: "./node_modules/materialize-css/bin/js/materialize.js",
      //         exports: 'materialize'
      //     }          
      // }      
    })
    .transform(babelify)
    .bundle()
    .pipe(source('app.js'))
    .pipe(buffer())    
    .pipe(uglify())    
    .pipe(gulp.dest(public_dir+'/js'))
    .pipe(livereload());

});



// Jade2Html
gulp.task('jade2html',['json'], () => {

  var layouts=[];
  var i=0;
  for (var key in varjson) {
    layouts[i++]=jade_dir+'/'+key+'.jade';
  }
  console.log(layouts);
  gulp.src(layouts)
    .pipe(data(function(file) {
      var items = path.basename(file.path).split('.jade');
      return varjson[items[0]];
    }))
    .pipe(jade({
      'pretty': true,
    })) 

    .pipe(gulp.dest(html_dir))
    .pipe(wait(900))    
    .pipe(livereload());
    
});


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



// Server
gulp.task('server', function(done) {

  // varjson = require(json_dir+'/data.json');

  http.createServer(
    st({ path: __dirname, cache: false })
  ).listen(8080, done);
  
});




// Jade2PHP
gulp.task('jade2php', () => {

  exec('jade2php --pretty --omit-php-runtime --omit-php-extractor  '+folder+'/app/sources/jade/layout*.jade '+folder+'/app/sources/jade/email*.jade --out '+folder+'/app/views/php', function (err, stdout, stderr) {
    // console.log(stdout);
    console.log(stderr);
  });

});

// gulp.task("jade2php2", () => {
//   gulp.src(folder + "/app/sources/jade/layout*.jade")
//     // .pipe(jade({ locals: { title: "OMG THIS IS THE TITLE" } }))
//     .pipe(jade_php({}))
//     .pipe(gulp.dest(folder + "/app/views/php"));
// });





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




// Watch
gulp.task('watch',[
  // 'server',
  // 'json',
  'stylus',
  'browserify',
  'jade2php',
  // 'jade2html',  
  'email_inline',
  ], () => {
  
  livereload.listen();  
  
  // console.log(comp_dir+'/**/*.styl');

  const external_stylus =require(stylus_dir+'/externals/external.json');
  const external_jade   =require(jade_dir+'/externals/external.json')
  const external_es6    =require(es6_dir+'/externals/external.json')

  //watch styl
  gulp.watch([
    comp_dir+'/**/*.styl',
    stylus_dir+'/*.styl',
    stylus_dir+'/**/*.styl',
    work_stylus_dir+'/**/*.styl'
    ], ['stylus','touch']);

  // console.log(comp_dir);
  // console.log(external_stylus);
  gulp.watch(external_stylus,['stylus','touch']);


  //watch browserify
  gulp.watch([
    comp_dir+'/**/*.js',
    es6_dir+'/**/*.js'
    ], ['browserify','touch']);


  gulp.watch(external_es6,['browserify','touch']);


  //watch jade2html and jade2php
  gulp.watch([
    comp_dir+'/**/*.jade',
    work_jade_dir+'/**/*.jade',
    jade_dir+'/**/*.jade'
    ], [
    // 'jade2html',
    'jade2php',
    'email_inline'
    ]);


  gulp.watch(external_jade,['jade2php']);


  if(activelivedeploy)
    gulp.watch(modifies, function(event){
      livedeploy(event.path)
    });


});






// Default
gulp.task('default',
[
  'watch'
]);



// Generate Jsons for development
gulp.task('json',() => {

  var geturl = 'http://localhost/frame/'+folder+'/runtime/jsons';
  console.log(geturl);
  console.log('task json');
  request(geturl);  
  // curl(geturl,{}, function(err) {
  //   console.info(this.body);
  //   varjson = require(json_dir+'/data.json');
  // });   

});

// gulp.task('update',() => {

//   var geturl = 'http://localhost/frame/'+folder+'/runtime/updatedb';

//   curl(geturl,{}, function(err) {

//     console.info(this.body);

//   });   

// });



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
      // .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));

});


// Generate Jsons for development
gulp.task('components',() => {

  const geturl = 'http://localhost/frame/'+folder+'/runtime/start/'+clean;
  console.log(geturl);
  console.log('task components');
  request(geturl);    
  // curl(geturl,{}, function(err) {
  //   console.info(this.body);
  //   // varjson = require(json_dir+'/data.json');
  // });   

});



module.exports = gulp