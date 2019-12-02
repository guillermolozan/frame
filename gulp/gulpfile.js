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

/*
 ________ ________  ________  _____ ______   _______
|\  _____\\   __  \|\   __  \|\   _ \  _   \|\  ___ \
\ \  \__/\ \  \|\  \ \  \|\  \ \  \\\__\ \  \ \   __/|
 \ \   __\\ \   _  _\ \   __  \ \  \\|__| \  \ \  \_|/__
  \ \  \_| \ \  \\  \\ \  \ \  \ \  \    \ \  \ \  \_|\ \
   \ \__\   \ \__\\ _\\ \__\ \__\ \__\    \ \__\ \_______\
    \|__|    \|__|\|__|\|__|\|__|\|__|     \|__|\|_______|



*/



/*
########  ######## ########  ######## ##    ## ########  ######## ##    ##  ######  #### ########  ######
##     ## ##       ##     ## ##       ###   ## ##     ## ##       ###   ## ##    ##  ##  ##       ##    ##
##     ## ##       ##     ## ##       ####  ## ##     ## ##       ####  ## ##        ##  ##       ##
##     ## ######   ########  ######   ## ## ## ##     ## ######   ## ## ## ##        ##  ######    ######
##     ## ##       ##        ##       ##  #### ##     ## ##       ##  #### ##        ##  ##             ##
##     ## ##       ##        ##       ##   ### ##     ## ##       ##   ### ##    ##  ##  ##       ##    ##
########  ######## ##        ######## ##    ## ########  ######## ##    ##  ######  #### ########  ######
*/
// gulp
const gulp         = require('gulp'),
      argv         = require('yargs').default('p','model').argv,
      chalk        = require('chalk'),
      keys         = require('gulp-keylistener'),
      // exit         = require('gulp-exit');
      atg          = require('ascii-text-generator');
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

const restart      = require('gulp-restart');


/*
##     ##    ###    ########   ######
##     ##   ## ##   ##     ## ##    ##
##     ##  ##   ##  ##     ## ##
##     ## ##     ## ########   ######
 ##   ##  ######### ##   ##         ##
  ## ##   ##     ## ##    ##  ##    ##
   ###    ##     ## ##     ##  ######
*/

const folder           = '../'+argv.p;
const app              = './'+folder;
const work             = './../work';
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

var activelivedeploy = (depl == 'live')?true:false;

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






/*
 ######  ######## ##    ## ##       ##     ##  ###### 
##    ##    ##     ##  ##  ##       ##     ## ##    ##
##          ##      ####   ##       ##     ## ##
 ######     ##       ##    ##       ##     ##  ######
      ##    ##       ##    ##       ##     ##       ##
##    ##    ##       ##    ##       ##     ## ##    ##
 ######     ##       ##    ########  #######   ######
*/
const stylus_task = ()=>{

  touch_task('css');

  return gulp.src(stylus_dir+'/app.styl')
  .pipe(stylus({
    'include css': true,
    'compress': true
  }))
  .pipe(autoprefixer()) 
  .pipe(gulp.dest(public_dir+'/css'))
  .pipe(livereload());

};



/*
      ##    ###    ########  ########  #######  ########  ##     ## ########
      ##   ## ##   ##     ## ##       ##     ## ##     ## ##     ## ##     ##
      ##  ##   ##  ##     ## ##              ## ##     ## ##     ## ##     ##
      ## ##     ## ##     ## ######    #######  ########  ######### ########
##    ## ######### ##     ## ##       ##        ##        ##     ## ##
##    ## ##     ## ##     ## ##       ##        ##        ##     ## ##
 ######  ##     ## ########  ######## ######### ##        ##     ## ##
*/
const jade2php_task = ()=>{

  const command = 'jade2php --pretty --omit-php-runtime --omit-php-extractor  ' + folder + '/app/sources/jade/layout*.jade ' + folder + '/app/sources/jade/email*.jade --out ' + folder + '/app/views/php';
  console.log(chalk.bgMagenta(" building php views  .... "));
  // console.log(command);
  return exec(command, function(err, stdout, stderr) {
    console.log(stderr);
  });

};



/*
########  #######  ##     ##  ######  ##     ##
   ##    ##     ## ##     ## ##    ## ##     ##
   ##    ##     ## ##     ## ##       ##     ##
   ##    ##     ## ##     ## ##       #########
   ##    ##     ## ##     ## ##       ##     ##
   ##    ##     ## ##     ## ##    ## ##     ##
   ##     #######   #######   ######  ##     ##
*/
const touch_task = (some=null) => {

  var filetouch = app+'/touch.json';
  var touch=require(filetouch);
  var newtouch = ++touch.v;
  console.log(chalk.bgRed(" building "+some+" .... ")+chalk.blue(" v:"+newtouch));
  writeFile.sync(filetouch, '{"v":"'+newtouch+'"}');

};







/*
########  ########   #######  ##      ##  ######  ######## ########  #### ######## ##    ##
##     ## ##     ## ##     ## ##  ##  ## ##    ## ##       ##     ##  ##  ##        ##  ##
##     ## ##     ## ##     ## ##  ##  ## ##       ##       ##     ##  ##  ##         ####
########  ########  ##     ## ##  ##  ##  ######  ######   ########   ##  ######      ##
##     ## ##   ##   ##     ## ##  ##  ##       ## ##       ##   ##    ##  ##          ##
##     ## ##    ##  ##     ## ##  ##  ## ##    ## ##       ##    ##   ##  ##          ##
########  ##     ##  #######   ###  ###   ######  ######## ##     ## #### ##          ##
*/
const browserify_task = ()=>{

  touch_task('browserify');

  return browserify({
    entries: es6_dir+'/app.js', 
  })
  .transform("babelify")
  .bundle()
  .pipe(source('app.js'))
  .pipe(buffer())
  .pipe(uglify())
  .pipe(gulp.dest(public_dir+'/js'))
  .pipe(livereload());

};





const email_inline_task = ()=>{
    
  return gulp.src(folder+'/app/views/php/email_*.php')
  .pipe(inlineCss({
      applyStyleTags : true,
      applyLinkTags  : true,
      removeStyleTags: true,
      removeLinkTags : true
  }))
  .pipe(gulp.dest(folder+'/app/views/php/inline/'));

};













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


  './../work/core/**/*.php',
  './../work/data_test/**/*.php',
  './../work/library/**/*.php',
  './../work/vendor/**/*.+(css|js|php)',
  './../htaccess'

];



const external_stylus = require(stylus_dir + '/externals/external.json');
const external_jade = require(jade_dir + '/externals/external.json');
const external_es6 = require(es6_dir + '/externals/external.json');

const all_watch_stylus=[
  // comp_dir+'/**/*.styl',
  stylus_dir+'/*.styl',
  stylus_dir+'/**/*.styl',
  work_stylus_dir+'/**/*.styl'
].concat(external_stylus);

const all_watch_js=[
  // comp_dir+'/**/*.js',
  es6_dir+'/**/*.js'
  // external_es6    
].concat(external_es6);

const all_watch_jade=    [
  // comp_dir+'/**/*.jade',
  work_jade_dir+'/**/*.jade',
  jade_dir+'/**/*.jade'
  // external_jade      
].concat(external_jade);

/*
##      ##    ###    ########  ######  ##     ##
##  ##  ##   ## ##      ##    ##    ## ##     ##
##  ##  ##  ##   ##     ##    ##       ##     ##
##  ##  ## ##     ##    ##    ##       #########
##  ##  ## #########    ##    ##       ##     ##
##  ##  ## ##     ##    ##    ##    ## ##     ##
 ###  ###  ##     ##    ##     ######  ##     ##
*/
const watch_task = () => {

  livereload.listen();
  
  console.log(chalk.yellow("watching stylus..."));
  console.log(all_watch_stylus);

  console.log(chalk.yellow("watching es6..."));
  console.log(all_watch_js);
  
  console.log(chalk.yellow("watching jade..."));
  console.log(all_watch_jade);

  //watch stylus
  gulp.watch(
    all_watch_stylus
    ,
    stylus_task
  );
  

  //watch browserify
  gulp.watch(
    all_watch_js
    , 
    browserify_task
  );


  //watch jade
  gulp.watch(
    all_watch_jade
    ,
    jade2php_task
  );
  


  // gulp.watch(
  //   [app+'/app/config/components.php']
  //   , 
  //   restart_task
  // );

  /*
  gulp.watch(
    modifies
    ,
    live_deploy_task
    function(event){
      console.log(event);
      // livedeploy_task(event.path)

    }
  );
  */


  

  keys((ch, key)=> {
    if (key.ctrl && key.name === 'l') {
      if(activelivedeploy){

        activelivedeploy=false;
        gutil.log(gutil.colors.bgRed('live deploy desactivado'));
        
      } else {

        activelivedeploy=true;
        gutil.log(gutil.colors.bgGreen('live deploy activado'));
        
      }

    }

    if (key.ctrl && key.name === 'u') {

      gutil.log(gutil.colors.bgGreen('uploading.....'));

      deploy_task();

    }

  })


  if(activelivedeploy)
    gutil.log(gutil.colors.bgGreen('live deploy activado'));
  else
    gutil.log(gutil.colors.bgRed('live deploy desactivado'));


  const watcher = gulp.watch(modifies);

  watcher.on('change', function(path, stats) {

    live_deploy_task(path);
    
  });

}

const live_deploy_task= function(file){

  if(activelivedeploy){

    // console.log(dconn);
    if (typeof(conn) == "undefined")
      conn = ftp.create(dconn);

    remotedir = dconn.remotedir || '/public_html';

    return gulp.src([file],{base:'..',buffer:false})
      .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));
      
  } 

}


/*
########  ########  ######  ########    ###    ########  ########
##     ## ##       ##    ##    ##      ## ##   ##     ##    ##
##     ## ##       ##          ##     ##   ##  ##     ##    ##
########  ######    ######     ##    ##     ## ########     ##
##   ##   ##             ##    ##    ######### ##   ##      ##
##    ##  ##       ##    ##    ##    ##     ## ##    ##     ##
##     ## ########  ######     ##    ##     ## ##     ##    ##
*/
const restart_task = async() => {
  
  gutil.log(gutil.colors.bgRed("RESTARTING..............."));

  restart();
  
  livereload();

}

/*
##     ## ######## ##       ##        #######
##     ## ##       ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
######### ######   ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
##     ## ######## ######## ########  #######
*/
const hello_task = async ()=>{
  
  return console.log(chalk.yellow(atg(argv.p,"3")));

}




/*
########  ######## ########  ##        #######  ##    ##
##     ## ##       ##     ## ##       ##     ##  ##  ##
##     ## ##       ##     ## ##       ##     ##   ####
##     ## ######   ########  ##       ##     ##    ##
##     ## ##       ##        ##       ##     ##    ##
##     ## ##       ##        ##       ##     ##    ##
########  ######## ##        ########  #######     ##
*/
const deploy_task = async()=>{

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
        './../work/core/**',
        './../work/data_test/**',
        './../work/library/**',
        './../work/vendor/**',
        './../work/public/**',
        './../.htaccess',
    ];

    const globs4 = [
        '../index.php',
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

    console.log(globs);

    // using base = '.' will transfer everything to /public_html correctly 
    // turn off buffering in gulp.src for best performance 
    return gulp.src(globs,{base:'..',buffer:false})
      .pipe(conn.newer(remotedir)) // only upload newer files 
      .pipe(conn.dest(remotedir));

};


/*
 ######   #######  ##     ## ########   #######  ##    ## ######## ##    ## ########  ######
##    ## ##     ## ###   ### ##     ## ##     ## ###   ## ##       ###   ##    ##    ##    ##
##       ##     ## #### #### ##     ## ##     ## ####  ## ##       ####  ##    ##    ##
##       ##     ## ## ### ## ########  ##     ## ## ## ## ######   ## ## ##    ##     ######
##       ##     ## ##     ## ##        ##     ## ##  #### ##       ##  ####    ##          ##
##    ## ##     ## ##     ## ##        ##     ## ##   ### ##       ##   ###    ##    ##    ##
 ######   #######  ##     ## ##         #######  ##    ## ######## ##    ##    ##     ######
*/
// Generate Jsons for development
const components_task = ()=>{

  const geturl = urlfolder+'/runtime/start/'+clean;
  console.log(geturl);

  console.log(chalk.green('task components....'));

  return request(geturl, function(error, response, body) {
    // console.log("error:", error); // Print the error if one occurred
    // console.log("statusCode:", response && response.statusCode); // Print the response status code if a response was received
    // console.log(chalk.green("body:", body)); // Print the HTML for the Google homepage.
  });
  // request(geturl);    

};

/*
 ######   ######## ########     ######   #######  ##     ## ########   #######  ##    ## ######## ##    ## ########  ######
##    ##  ##          ##       ##    ## ##     ## ###   ### ##     ## ##     ## ###   ## ##       ###   ##    ##    ##    ##
##        ##          ##       ##       ##     ## #### #### ##     ## ##     ## ####  ## ##       ####  ##    ##    ##
##   #### ######      ##       ##       ##     ## ## ### ## ########  ##     ## ## ## ## ######   ## ## ##    ##     ######
##    ##  ##          ##       ##       ##     ## ##     ## ##        ##     ## ##  #### ##       ##  ####    ##          ##
##    ##  ##          ##       ##    ## ##     ## ##     ## ##        ##     ## ##   ### ##       ##   ###    ##    ##    ##
 ######   ########    ##        ######   #######  ##     ## ##         #######  ##    ## ######## ##    ##    ##     ######
*/
const get_comp_task = async () => {

  const comp_dir_from         = './../'+argv.q+'/app/sources/components';
  const component = argv.c;

  const comp_dir_from_jade =comp_dir_from+'/'+component+'/'+component+'.jade';
  const comp_dir_from_styl =comp_dir_from+'/'+component+'/'+component+'.styl';
  const comp_dir_from_es6 =comp_dir_from+'/'+component+'/'+component+'.js';

  const comp_dir_to =comp_dir+'/'+component+'/';

  gulp.src(comp_dir_from_jade)
  .pipe(gulp.dest(comp_dir_to));

  gulp.src(comp_dir_from_styl)
  .pipe(gulp.dest(comp_dir_to));
  
  return gulp.src(comp_dir_from_es6)
  .pipe(gulp.dest(comp_dir_to));  

};


exports.touch   = touch_task;
exports.stylus  = stylus_task;
exports.php     = jade2php_task;
exports.watch   = watch_task;
exports.browserify   = browserify_task;


exports.components   = components_task;
exports.get_comp   = get_comp_task;
exports.deploy   = deploy_task;
// exports.email_inline   = email_inline_task;


exports.default = gulp.series(hello_task,components_task,stylus_task,jade2php_task,browserify_task,watch_task);
// exports.default = gulp.series(stylus_task,jade2php_task,browserify_task);
