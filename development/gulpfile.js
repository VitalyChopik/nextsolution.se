// const gulp = require( 'gulp' );
// const {src, dest, watch, series, parallel} = require( 'gulp' );
// const sass          = require('gulp-sass')(require('sass'));
// const sourcemaps    = require( 'gulp-sourcemaps' );
// const babel         = require( "gulp-babel" );
// const eslint        = require( 'gulp-eslint' );
// const uglify        = require( 'gulp-uglify' );
// const concat        = require( 'gulp-concat' );
// const gutil         = require( 'gulp-util' );
// const browserify    = require( 'gulp-browserify' );
// const babelify      = require( 'babelify' );
// const autoprefixer  = require('gulp-autoprefixer');

// sass.compiler = require( 'node-sass' );

// const paths = {
// 	styles: {
// 		src: 'sass/**/*.scss',
// 		dest: '../build/styles/'
// 	},
// 	scripts: {
// 		src: 'js/**/*.js',
// 		dest: '../build/js/'
// 	}
// };

// function js_compile() {
// return gulp.src( 'js/customization.js' )
// 	.pipe( eslint() )
// 	.pipe( eslint.format() )
// 	.pipe( eslint.failAfterError() )
// 	.pipe( browserify( {
// 		transform: ['babelify'],
// 	} ) )
// 	.pipe( uglify() )
// 	.pipe( gulp.dest( paths.scripts.dest ) )
// 	.on( 'error', gutil.log );
// }

// function combile_libs_js() {
// 	return gulp.src( [
// 		'js/jquery.fancybox.min.js',
// 		'js/jquery.waypoints.min.js',
// 		// 'js/jquery.touchSwipe.min.js',
// 		'js/app.js',
// 		//'js/js.cookie.js',
// 		'js/slick.js',
// 		//'js/select2.min.js',
// 		//'js/jquery.formstyler.min.js',
// 	] )
// 		.pipe( concat( 'libs.js' ) )
// 		.pipe( gulp.dest( paths.scripts.dest ) )
// 		.on( 'error', gutil.log );
// }

// function styles() {
// 	return gulp.src( paths.styles.src )
// 		.pipe( sourcemaps.init() )
// 		.pipe( sass( {outputStyle: 'compressed'} ).on( 'error', sass.logError ) )
// 		.pipe(autoprefixer(['last 2 versions', '> 1%'], { cascade: true }))
// 		.pipe( sourcemaps.write() )
// 		.pipe( gulp.dest( paths.styles.dest ) );
// }

// function watch2() {
// 	gulp.watch( paths.styles.src, styles );
// 	gulp.watch( paths.scripts.src, combile_libs_js );
// 	gulp.watch( paths.scripts.src, js_compile );
// }

// function build() {
// 	styles();
// 	combile_libs_js();
// 	js_compile();
// }

// /*
//  * You can use CommonJS `exports` module notation to declare tasks
//  */
// exports.watch = watch2;
// exports.build = gulp.series( styles, gulp.parallel( combile_libs_js, js_compile ) );

const gulp = require("gulp");
const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");
const babel = require("gulp-babel");
const eslint = require("gulp-eslint");
const uglify = require("gulp-uglify");
const concat = require("gulp-concat");
const gutil = require("gulp-util");
const browserify = require("gulp-browserify");
const babelify = require("babelify");
const autoprefixer = require("gulp-autoprefixer");
const browserSync = require("browser-sync").create();
const del = require("del");

const paths = {
    styles: {
        src: "sass/**/*.scss",
        dest: "../build/styles/",
    },
    scripts: {
        src: "js/**/*.js",
        dest: "../build/js/",
    },
    fonts: {
        src: "fonts/**/*.*",
        dest: "../build/fonts/",
    },
    img: {
        src: "img/**/*.*",
        dest: "../build/img/",
    },
};

// Определяем логику работы Browsersync
function browsersync() {
    browserSync.init({
        // Инициализация Browsersync
        proxy: "http://next.local/",
        notify: false, // Отключаем уведомления
        online: true, // Режим работы: true или false
    });
}

function scripts() {
    return gulp
        .src([
            "js/jquery.fancybox.min.js",
            "js/jquery.waypoints.min.js",
            // 'js/jquery.touchSwipe.min.js',
            "js/app.js",
            //'js/js.cookie.js',
            "js/slick.js",
            "js/wheel/jquery.marquee.min.js",
            // 'js/wheel/smartscroll.js',
            //'js/select2.min.js',
            //'js/jquery.formstyler.min.js',
        ])
        .pipe(concat("libs.js"))
        .pipe(gulp.dest(paths.scripts.dest))
        .pipe(browserSync.stream());
}

function scripts2() {
    return (
        gulp
            .src("js/customization.js")
            .pipe(eslint())
            .pipe(eslint.format())
            .pipe(eslint.failAfterError())
            .pipe(
                browserify({
                    transform: ["babelify"],
                })
            )
            // .pipe(babel({
            // 	presets: ['@babel/env']
            // }))
            .pipe(uglify())
            .pipe(gulp.dest(paths.scripts.dest))
            .on("error", gutil.log)
            .pipe(browserSync.stream())
    ); // Сделаем инъекцию в браузер
}

function scripts3() {
    return (
        gulp
            .src("js/menu.js")
            .pipe(eslint())
            .pipe(eslint.format())
            .pipe(eslint.failAfterError())
            .pipe(
                browserify({
                    transform: ["babelify"],
                })
            )
            // .pipe(babel({
            // 	presets: ['@babel/env']
            // }))
            .pipe(uglify())
            .pipe(gulp.dest(paths.scripts.dest))
            .on("error", gutil.log)
            .pipe(browserSync.stream())
    ); // Сделаем инъекцию в браузер
}

function styles() {
    return gulp
        .src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
        .pipe(autoprefixer(["last 2 versions", "> 1%"], { cascade: true }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream()); // Сделаем инъекцию в браузер
}

// async function images() {
// 	imagecomp(
// 		"app/images/src/**/*", // Берём все изображения из папки источника
// 		"app/images/dest/", // Выгружаем оптимизированные изображения в папку назначения
// 		{ compress_force: false, statistic: true, autoupdate: true }, false, // Настраиваем основные параметры
// 		{ jpg: { engine: "mozjpeg", command: ["-quality", "75"] } }, // Сжимаем и оптимизируем изображеня
// 		{ png: { engine: "pngquant", command: ["--quality=75-100", "-o"] } },
// 		{ svg: { engine: "svgo", command: "--multipass" } },
// 		{ gif: { engine: "gifsicle", command: ["--colors", "64", "--use-col=web"] } },
// 		function (err, completed) { // Обновляем страницу по завершению
// 			if (completed === true) {
// 				browserSync.reload()
// 			}
// 		}
// 	)
// }

function copyimg() {
    return src(paths.img.src) // Параметр "base" сохраняет структуру проекта при копировании
        .pipe(dest(paths.img.dest)); // Выгружаем в папку с финальной сборкой
}

function copyfonts() {
    return src(paths.fonts.src) // Параметр "base" сохраняет структуру проекта при копировании
        .pipe(dest(paths.fonts.dest)); // Выгружаем в папку с финальной сборкой
}

function cleandist() {
    return del("../build/**/*", { force: true }); // Удаляем все содержимое папки "dist/"
}

function startwatch() {
    // Выбираем все файлы JS в проекте, а затем исключим с суффиксом .min.js
    watch(paths.scripts.src, scripts);
    watch(paths.scripts.src, scripts2);
    watch(paths.scripts.src, scripts3);

    // Мониторим файлы препроцессора на изменения
    watch(paths.styles.src, styles);

    // Мониторим файлы HTML на изменения
    watch("../../**/*.php").on("change", browserSync.reload);

    // Мониторим папку-источник изображений и выполняем images(), если есть изменения
    // watch('app/images/src/**/*', images);
}

// Экспортируем функцию browsersync() как таск browsersync. Значение после знака = это имеющаяся функция.
exports.browsersync = browsersync;

// Экспортируем функцию scripts() в таск scripts
exports.scripts = scripts;

// Экспортируем функцию styles() в таск styles
exports.styles = styles;

// Экспорт функции images() в таск images
// exports.images = images;

// Экспортируем функцию cleanimg() как таск cleanimg
// exports.cleanimg = cleanimg;

// Создаем новый таск "build", который последовательно выполняет нужные операции
exports.build = series(cleandist, styles, scripts, scripts2, scripts3, copyimg, copyfonts);

// Экспортируем дефолтный таск с нужным набором функций
exports.watch = parallel(styles, scripts, scripts2, scripts3, copyimg, copyfonts, browsersync, startwatch);
