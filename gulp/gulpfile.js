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
const gulp = require('gulp'),
	argv = require('yargs').default('p', 'model').argv,
	chalk = require('chalk'),
	keys = require('gulp-keylistener'),
	// exit         = require('gulp-exit');
	atg = require('ascii-text-generator'),
	gutil = require('gulp-util');

// stylus, postcss and tailwind
const stylus = require('gulp-stylus'),
	autoprefixer = require('gulp-autoprefixer'),
	poststylus = require('poststylus'),
	postcss = require('gulp-postcss'),
	tailwindcss = require('tailwindcss'),
	cssnano = require('cssnano'),
	postcssEasyImport = require('postcss-easy-import'),
	cssnested = require('postcss-nesting'),
	purgecss = require("@fullhuman/postcss-purgecss"),
	// atImport = require('postcss-import'),
	livereload = require('gulp-livereload');

// touch
const writeFile = require('write');

// browserify;
const browserify = require('browserify'),
	babelify        = require('babelify'),
	uglify          = require('gulp-uglify'),
	source          = require('vinyl-source-stream'),
	buffer          = require('vinyl-buffer'),
	webpack         = require('webpack-stream');
	
const execute 	= require('gulp-exec');

const exec       = require('child_process').exec;

const inlineCss  = require('gulp-inline-css');

const request    = require('request');

const ftp        = require('vinyl-ftp');

const restart    = require('gulp-restart');

const fs         = require('fs');
const ini        = require('ini');

const fileExists = require('file-exists');



// const framework_css='stylus';
// const framework_css='tailwind';


/*
##     ##    ###    ########   ######
##     ##   ## ##   ##     ## ##    ##
##     ##  ##   ##  ##     ## ##
##     ## ##     ## ########   ######
 ##   ##  ######### ##   ##         ##
  ## ##   ##     ## ##    ##  ##    ##
   ###    ##     ## ##     ##  ######
*/

const folder = '../' + argv.p;
const app = './' + folder;

const work = './../work';
const urlfolder = 'http://localhost/frame/' + argv.p;

const comp_dir = app + '/app/sources/components';

const stylus_dir = app + '/app/sources/stylus';
const tailwind_dir = app + '/app/sources/tailwind';
const es6_dir = app + '/app/sources/es6';

const jade_dir = app + '/app/sources/jade';

const views_dir = app + '/app/views';
const html_dir = app + '/html';
const json_dir = app + '/json';

const public_dir = app + '/public';

const work_jade_dir = work + '/sources/jade';
const work_stylus_dir = work + '/sources/stylus';

const depl = argv.m || 'dead';
const clean = argv.c || '';

var activelivedeploy = depl == 'l' ? true : false;


const xdepl = argv.x || 'no-component';


var modeComponent = xdepl == 'g' ? true : false;; // si es true solo va a procesar layout_components.jade

var modeProd = !modeComponent; // || true;  // si es true va a aplicar purge y nano



gutil.log(gutil.colors.bgRed(' DEVELOPMENT' + (activelivedeploy ? ' AND DEPLOY' : '') + ' '));


gutil.log(gutil.colors.bgCyan(' MODE ' + (modeComponent ? ' COMPONENT ' : 'NO COMPONENT') + ' '));


var varjson;


var config;
var config_dir;
if(fileExists.sync(app + '/config.json')){
	config=require(app + '/config.json');
	config_dir=config.dir;
} else {
	config_dir=argv.p;
}

var proy_config;
var framework_css='stylus';
var source_file_js='app.js';
var source_dir_css='stylus';

if(fileExists.sync(app + '/project.json')){
	
	proy_config=require(app + '/project.json');

	if(proy_config.framework_css)
		framework_css=proy_config.framework_css;

	if(proy_config.source_file_js)
		source_file_js=proy_config.source_file_js;

	if(proy_config.source_dir_css)
		source_dir_css=proy_config.source_dir_css;

}

const sp_folder = '../../sistemapanel/' + config_dir + '/panel/';
const sp_config = sp_folder+'config/config.ini';
const sp_ini= ini.parse(fs.readFileSync(sp_config, 'utf-8'))

const dconn={
	"host":     sp_ini.REMOTE_FTP.ftp_files_host,
	"user":     sp_ini.REMOTE_FTP.ftp_files_user,
	"password": sp_ini.REMOTE_FTP.ftp_files_pass,
	"parallel": "3"
};
dconn.log = gutil.log;



 
fileExists('/index.html', (err, exists) => console.log(exists)) // OUTPUTS: true or false
 
fileExists('/index.html').then(exists => {
  console.log(exists) // OUTPUTS: true or false
})

// // console.log(dconn.host);
// // console.log(dconn.remotedir);
// // console.log('burbuja');

// var remotedir = dconn.remotedir || '/public_html';

/*
 ######  ######## ##    ## ##       ##     ##  ###### 
##    ##    ##     ##  ##  ##       ##     ## ##    ##
##          ##      ####   ##       ##     ## ##
 ######     ##       ##    ##       ##     ##  ######
      ##    ##       ##    ##       ##     ##       ##
##    ##    ##       ##    ##       ##     ## ##    ##
 ######     ##       ##    ########  #######   ######
*/
const stylus_task = () => {
	touch_task('css');

	return gulp
		.src(stylus_dir + '/app.styl')
		.pipe(
			stylus({
				'include css': true,
				compress: true
			})
		)
		.pipe(autoprefixer())
		.pipe(gulp.dest(public_dir + '/css'))
		// .on('error',gutil.log)
		.pipe(livereload());
};

/*
########    ###    #### ##       ##      ## #### ##    ## ########
   ##      ## ##    ##  ##       ##  ##  ##  ##  ###   ## ##     ##
   ##     ##   ##   ##  ##       ##  ##  ##  ##  ####  ## ##     ##
   ##    ##     ##  ##  ##       ##  ##  ##  ##  ## ## ## ##     ##
   ##    #########  ##  ##       ##  ##  ##  ##  ##  #### ##     ##
   ##    ##     ##  ##  ##       ##  ##  ##  ##  ##   ### ##     ##
   ##    ##     ## #### ########  ###  ###  #### ##    ## ########
*/
const tailwind_task= () => {


	touch_task('tailwind');
  
	if(modeProd)
		return gulp
			.src(tailwind_dir + '/app.css')
			.pipe(postcss([
				postcssEasyImport,
				tailwindcss(tailwind_dir+'/tailwind.config.js'),
				autoprefixer,
				cssnested,
				purgecss({
					content: all_watch_jade,
					defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
					safelist: ['active']
				}),
				cssnano,
			]))
			.pipe(gulp.dest(public_dir + '/css'))
			.pipe(livereload());
	else
		return gulp
			.src(tailwind_dir + '/app.css')
			.pipe(postcss([
				postcssEasyImport,
				tailwindcss(tailwind_dir+'/tailwind.config.js'),
				autoprefixer,
				cssnested
			]))
			.pipe(gulp.dest(public_dir + '/css'))
			.pipe(livereload());

};

/*
const tailwind_task_posible = () => {
	touch_task('tailwind');

    var processors = [
		tailwindcss,
        autoprefixer,
        cssnano
	];

	return gulp
		.src(tailwind_dir + '/tw.styl')
        .pipe(stylus({
            use: [
                poststylus(processors)
            ]
        }))		
	  .pipe(gulp.dest(public_dir + '/css'))
	  .pipe(livereload());

};
*/


/*
      ##    ###    ########  ########  #######  ########  ##     ## ########
      ##   ## ##   ##     ## ##       ##     ## ##     ## ##     ## ##     ##
      ##  ##   ##  ##     ## ##              ## ##     ## ##     ## ##     ##
      ## ##     ## ##     ## ######    #######  ########  ######### ########
##    ## ######### ##     ## ##       ##        ##        ##     ## ##
##    ## ##     ## ##     ## ##       ##        ##        ##     ## ##
 ######  ##     ## ########  ######## ######### ##        ##     ## ##
*/


const jade2php_task = () => {
	/*
	const command =
		'jade2php --pretty --omit-php-runtime --omit-php-extractor  ' +
		folder +
		'/app/sources/jade/layout*.jade ' +
		// folder +
		// '/app/sources/jade/email*.jade ' +
		' --out ' +
		folder +
		'/app/views/php';
	*/
	// console.log(command);
	/*
	return exec(command, function (err, stdout, stderr) {
		console.log(stderr);
		console.log(chalk.bgMagenta(' building php views  .... '));
		return livereload();
	});
	*/
	var optionsExec = {
		continueOnError: false, // default = false, true means don't emit error event
		pipeStdout: false, // default = false, true means stdout is written to file.contents
	};
	var reportOptions = {
		err: true, // default = true, false means don't write err
		stderr: true, // default = true, false means don't write stderr
		stdout: true // default = true, false means don't write stdout
	};
	var jade_dir_files = (modeComponent) ? '/layout_components.jade' : '/layout*.jade'
	return gulp
		.src(jade_dir + jade_dir_files )
		/**/
		.pipe(
			execute(
				file=>`jade2php --pretty --omit-php-runtime --omit-php-extractor `+
					`${file.path} ` +
					` --out ${folder}/app/views/php`
				,optionsExec)
			)
		/**/
		/*
		.pipe(
			execute(
				file=>`jade2php --pretty --omit-php-runtime --omit-php-extractor `+
					`${file.path} ` +
					` --out ${folder}/app/views/php`
				,optionsExec)
			)
		*/
		.pipe(execute.reporter(reportOptions));
		// .pipe( livereload() );

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
const touch_task = (some = null) => {
	var filetouch = app + '/touch.json';
	var touch = require(filetouch);
	var newtouch = ++touch.v;
	console.log(chalk.red(newtouch + ' ') + chalk.bgRed(' building ' + some + ' .... '));
	writeFile.sync(filetouch, '{"v":"' + newtouch + '"}');
};

/*
##      ## ######## ########  ########     ###     ######  ##    ##
##  ##  ## ##       ##     ## ##     ##   ## ##   ##    ## ##   ##
##  ##  ## ##       ##     ## ##     ##  ##   ##  ##       ##  ##
##  ##  ## ######   ########  ########  ##     ## ##       #####
##  ##  ## ##       ##     ## ##        ######### ##       ##  ##
##  ##  ## ##       ##     ## ##        ##     ## ##    ## ##   ##
 ###  ###  ######## ########  ##        ##     ##  ######  ##    ##
*/
const webpack_task = () => {
	touch_task('WEBPACK ');

	// var app_source = ()'app.js'

	return gulp
		.src(es6_dir + '/' + source_file_js)
		.pipe(
			webpack({
				mode: 'development',
				// mode:'production',
				module: {
					rules: [
						{
							test: /\.(js)$/,
							exclude: /node_modules/,
							use: ['babel-loader']
						}
					]
				},
				output: {
					filename: 'app.js'
				}
			})
		)
		// .on('error',gutil.log)
		.pipe(gulp.dest(public_dir + '/js'))
		.pipe(livereload());
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
const browserify_task = () => {
	touch_task('browserify');

	return browserify({
		entries: es6_dir + '/app.js'
	})
		.transform('babelify')
		.bundle()
		.pipe(source('app.js'))
		.pipe(buffer())
		.pipe(uglify())
		.pipe(gulp.dest(public_dir + '/js'))
		.pipe(livereload());
};

const email_inline_task = () => {
	return gulp
		.src(folder + '/app/views/php/email_*.php')
		.pipe(
			inlineCss({
				applyStyleTags: true,
				applyLinkTags: true,
				removeStyleTags: true,
				removeLinkTags: true
			})
		)
		.pipe(gulp.dest(folder + '/app/views/php/inline/'));
};

const modifies = [
	app + '/config/**',

	app + '/public/css/app.css',
	app + '/public/js/app.js',
	app + '/public/img/**',
	app + '/public/vendor/**/*.+(css|js)',

	app + '/app/controllers/**/*.php',
	app + '/app/views/php/**/*.php',
	app + '/app/config/*.php',
	app + '/app/config/**/*.php',
	// app+'/app/config/**/*.json',

	app + '/.htaccess',
	app + '/index.php',
	app + '/touch.json',

	'./../work/core/**/*.php',
	'./../work/data_test/**/*.php',
	'./../work/library/**/*.php',
	'./../work/vendor/**/*.+(css|js|php)',
	'./../htaccess'
];

let all_watch_tailwind;
if(source_dir_css=='tailwind'){
	const external_tailwind = require(tailwind_dir + '/externals/external.json');
	all_watch_tailwind = [
		tailwind_dir + '/*.css',
		tailwind_dir + '/*/*.css',
		'tailwind.config.js',
	].concat(external_tailwind);
}	
let all_watch_stylus;
if(source_dir_css=='stylus'){
	const external_stylus = require(stylus_dir + '/externals/external.json');
	all_watch_stylus = [
		// comp_dir+'/**/*.styl',
		stylus_dir + '/*.styl',
		stylus_dir + '/**/*.styl',
		work_stylus_dir + '/**/*.styl'
	].concat(external_stylus);	
}
const external_jade = require(jade_dir + '/externals/external.json');
const external_es6 = require(es6_dir + '/externals/external.json');





const all_watch_js = [
	// comp_dir+'/**/*.js',
	es6_dir + '/**/*.js'
	// external_es6
].concat(external_es6);

const all_watch_jade = [
	// comp_dir+'/**/*.jade',
	work_jade_dir + '/**/*.jade',
	jade_dir + '/**/*.jade'
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

	if(framework_css=='stylus'){
		console.log(chalk.yellow('watching stylus...'));
		console.log(all_watch_stylus);
	}
	if(framework_css=='tailwind'){
		console.log(chalk.yellow('watching tailwind...'));
		console.log(all_watch_tailwind);
	}	

	console.log(chalk.yellow('watching es6...'));
	console.log(all_watch_js);

	console.log(chalk.yellow('watching jade...'));
	console.log(all_watch_jade);

	if(framework_css=='stylus'){
		//watch stylus
		gulp.watch(all_watch_stylus, stylus_task);
	}

	if(framework_css=='tailwind'){
		//watch tailwind
		gulp.watch(all_watch_tailwind, tailwind_task);
	}	

	//watch webpack
	gulp.watch(all_watch_js, webpack_task);

	//watch jade
	gulp.watch(all_watch_jade, jade2php_task);

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

	keys((ch, key) => {

		if (key.ctrl && key.name === 'g') {
			if (modeComponent){

				modeComponent = false;
				gutil.log(gutil.colors.red('mode component desactivado'));

			} else {

				modeComponent = true;
				gutil.log(gutil.colors.green('mode component activado'));

			}
			// console.log('activelivedeploy '+activelivedeploy);
		}

		if (key.ctrl && key.name === 'l') {
			if (activelivedeploy){

				activelivedeploy = false;
				gutil.log(gutil.colors.bgRed('live deploy desactivado'));

			} else {

				activelivedeploy = true;
				gutil.log(gutil.colors.bgGreen('live deploy activado'));

			}
			// console.log('activelivedeploy '+activelivedeploy);
		}

		if (key.ctrl && key.name === 'u') {

			gutil.log(gutil.colors.bgGreen('uploading.....'));
			deploy_task();

		}

	});

	if (activelivedeploy) 
		gutil.log(gutil.colors.bgGreen('live deploy activado'));
	else 
		gutil.log(gutil.colors.bgRed('live deploy desactivado'));


	if (modeComponent) 
		gutil.log(gutil.colors.green('mode component activado'));
	else 
		gutil.log(gutil.colors.red('mode component desactivado'));
		
		
	const watcher = gulp.watch(modifies);

	watcher.on('change', function (path, stats) {
		live_deploy_task(path);
	});

};

/*
##       #### ##     ## ######## ########  ######## ########  ##        #######  ##    ##
##        ##  ##     ## ##       ##     ## ##       ##     ## ##       ##     ##  ##  ##
##        ##  ##     ## ##       ##     ## ##       ##     ## ##       ##     ##   ####
##        ##  ##     ## ######   ##     ## ######   ########  ##       ##     ##    ##
##        ##   ##   ##  ##       ##     ## ##       ##        ##       ##     ##    ##
##        ##    ## ##   ##       ##     ## ##       ##        ##       ##     ##    ##
######## ####    ###    ######## ########  ######## ##        ########  #######     ##
*/
const live_deploy_task = function (file) {
	if (activelivedeploy) {
		// console.log(dconn);
		// console.log(dconn);
		if (typeof conn == 'undefined') conn = ftp.create(dconn);

		remotedir = dconn.remotedir || '/public_html';

		return (
			gulp
				.src([file], { base: '..', buffer: false })
				// .pipe(conn.newer(remotedir)) // only upload newer files
				.pipe(conn.dest(remotedir))
		);
	}
};

/*
########  ########  ######  ########    ###    ########  ########
##     ## ##       ##    ##    ##      ## ##   ##     ##    ##
##     ## ##       ##          ##     ##   ##  ##     ##    ##
########  ######    ######     ##    ##     ## ########     ##
##   ##   ##             ##    ##    ######### ##   ##      ##
##    ##  ##       ##    ##    ##    ##     ## ##    ##     ##
##     ## ########  ######     ##    ##     ## ##     ##    ##
*/
const restart_task = async () => {
	gutil.log(gutil.colors.bgRed('RESTARTING...............'));

	restart();

	livereload();
};

/*
##     ## ######## ##       ##        #######
##     ## ##       ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
######### ######   ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
##     ## ##       ##       ##       ##     ##
##     ## ######## ######## ########  #######
*/
const hello_task = async () => {
	return console.log(chalk.yellow(atg(argv.p, '3')));
};

/*
########  ######## ########  ##        #######  ##    ##
##     ## ##       ##     ## ##       ##     ##  ##  ##
##     ## ##       ##     ## ##       ##     ##   ####
##     ## ######   ########  ##       ##     ##    ##
##     ## ##       ##        ##       ##     ##    ##
##     ## ##       ##        ##       ##     ##    ##
########  ######## ##        ########  #######     ##
*/
const deploy_task = async () => {

	// const config_dir=(config.dir)?config.dir:argv.p;
	// console.log('config_dir:'+config_dir);

	// const dconn = require(app + '/conn.json');
	dconn.log = gutil.log;

	const remotedir = dconn.remotedir || '/public_html';

	const conn = ftp.create(dconn);

	const globspc = [app + '/public/css/app.css', app + '/touch.json'];
	const globspi = [app + '/public/img/**'];
	const globspj = [app + '/public/js/app.js', app + '/touch.json'];
	const globspv = [app + '/public/font/**', app + '/public/vendor/**'];
	const globsc = [app + '/app/controllers/**', app + '/app/models/**'];
	const globsv = [app + '/app/views/php/**'];
	const globs2 = [
		app + '/app/config/**',
		// app+'/vendor/**',
		app + '/.htaccess',
		app + '/touch.json',
		app + '/project.json',
		app + '/index.php'
	];

	const globs3 = [
		'./../work/core/**',
		'./../work/data_test/**',
		'./../work/library/**',
		'./../work/vendor/**',
		'./../work/public/**',
		'./../work/sources/img/**',
		'./../.htaccess'
	];

	const globs4 = ['./../index.php'];

	const indextxt = "<?php chdir('" + folder.replace('../','') + "'); include 'index.php';";

	globs = [];
	if (argv.a == 'css') {
		globs = globspc;
	} else if (argv.a == 'img') {
		globs = globspi;
	} else if (argv.a == 'js') {
		globs = globspj;
	} else if (argv.a == 'vendor') {
		globs = globspv;
	} else if (argv.a == 'public') {
		globs = globspc.concat(globspi).concat(globspj).concat(globspv);
	} else if (argv.a == 'controllers') {
		globs = globsc;
	} else if (argv.a == 'views') {
		globs = globsv;
	} else if (argv.a == 'config') {
		globs = globs2;
	} else if (argv.a == 'work') {
		globs = globs3;
	} else if (argv.a == 'index') {
		writeFile.sync('../index.php', indextxt);
		globs = globs4
			.concat([
				'./../.htaccess',
				'./../404.html'
			]);
	} else if (argv.a == 'install') {
		writeFile.sync('../index.php', indextxt);
		globs = globspc
			.concat(globs4)
			.concat(globspi)
			.concat(globspj)
			.concat(globspv)
			.concat(globsc)
			.concat(globsv)
			.concat(globs2)
			.concat(globs3);
	} else {
		globs = globspc
			.concat(globspi)
			.concat(globspj)
			.concat(globspv)
			.concat(globsc)
			.concat(globsv)
			.concat(globs2)
			.concat(globs3);
	}

	console.log(globs);

	// using base = '.' will transfer everything to /public_html correctly
	// turn off buffering in gulp.src for best performance
	return gulp
		.src(globs, { base: '..', buffer: false })
		// .pipe(prueba())
		.pipe(conn.newer(remotedir)) // only upload newer files
		.pipe(conn.dest(remotedir));
};
// const prueba = (ele)=>{
// 	console.log(ele);
// 	return ele;
// }
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
const components_task = async () => {
	const geturl = urlfolder + '/runtime/start/' + clean;
	console.log(geturl);

	console.log(chalk.green('task components....'));

	return request(geturl, function (error, response, body) {
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
	const comp_dir_from = './../' + argv.q + '/app/sources/components';
	const component = argv.c;

	const comp_dir_from_jade = comp_dir_from + '/' + component + '/' + component + '.jade';
	const comp_dir_from_styl = comp_dir_from + '/' + component + '/' + component + '.styl';
	const comp_dir_from_es6 = comp_dir_from + '/' + component + '/' + component + '.js';

	const comp_dir_to = comp_dir + '/' + component + '/';

	gulp.src(comp_dir_from_jade).pipe(gulp.dest(comp_dir_to));

	gulp.src(comp_dir_from_styl).pipe(gulp.dest(comp_dir_to));

	return gulp.src(comp_dir_from_es6).pipe(gulp.dest(comp_dir_to));
};

/*
 ######   ######   ######
##    ## ##    ## ##    ##
##       ##       ##
##        ######   ######
##             ##       ##
##    ## ##    ## ##    ##
 ######   ######   ######
*/
const css_task = async () => {

	if(framework_css=='tailwind'){
		tailwind_task();
	}
	if(framework_css=='stylus'){
		stylus_task();
	}
	
}


exports.touch = touch_task;
exports.stylus = stylus_task;
exports.php = jade2php_task;
exports.watch = watch_task;
// exports.browserify = browserify_task;
exports.webpack = webpack_task;

exports.components = components_task;
exports.get_comp = get_comp_task;
exports.deploy = deploy_task;
// exports.email_inline   = email_inline_task;

exports.default = gulp.series(hello_task, components_task, css_task,jade2php_task, webpack_task, watch_task);

// exports.tw = gulp.series(hello_task, components_task, gulp.parallel(tailwind_task, jade2php_task, webpack_task), watch_task);
