
/**************** gulpfile.js configuration ****************/

let siteName = 'pontem-v2'
// development or production
let devBuild = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development')

// directory locations
let dir = {
    src: '../Sonder-Client/',
    build: '../Sonder-Client/build/'
}

// modules
let gulp = require('gulp')
let newer = require('gulp-newer')
let size = require('gulp-size')
let imagemin = require('gulp-imagemin')
let sass = require('gulp-sass')
let minCss = require('gulp-clean-css')
let concat = require('gulp-concat')
let browsersync = devBuild ? require('browser-sync').create() : null
var autoprefixer = require('gulp-autoprefixer')
let rename = require('gulp-rename')

console.log('Gulp', devBuild ? 'development' : 'production', 'build');

/**************** images task ****************/
const imgConfig = {
    src: dir.src + 'img/**/*',
    build: dir.build + 'img/',
    minOpts: {
        optimizationLevel: 5
    }
};

gulp.task('minify-images', function () {
    gulp.src(imgConfig.src)
        .pipe(newer(imgConfig.build))
        .pipe(imagemin(imgConfig.minOpts))
        .pipe(size({ showFiles: true }))
        .pipe(gulp.dest(imgConfig.build));
})


/**************** CSS task ****************/
const cssConfig = {

    src: dir.src + 'styles/core.scss',
    watch: dir.src + 'styles/**/*.scss',
    build: dir.src + 'styles/',
    sassOpts: {
        sourceMap: devBuild,
        imagePath: '/images/',
        precision: 3,
        errLogToConsole: true
    },


};

gulp.task('css', function () {
    gulp.src(cssConfig.src)
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest(cssConfig.build))

        // Minify CSS
        .pipe(minCss())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest(cssConfig.build))
})

gulp.task('js', function () {
    return gulp.src(['js/scripts.js', 'js/plugins/jquery.bxslider.js', 'js/lib/modernizr-2.7.1.min.js'])
        .pipe(concat('js/scripts-min.js'))
        .pipe(gulp.dest('../Sonder-Client'));
});

function watch() {
    browsersync.init({
        proxy: siteName + ".test",
        host: siteName + '.test',
        open: 'local',
        port: 80
    })

    gulp.watch('js/scripts.js', gulp.series('js')).on('change', browsersync.reload)
    gulp.watch(cssConfig.watch).on('change', gulp.series('css'))
    gulp.watch(cssConfig.watch).on('change', browsersync.reload)
    gulp.watch('*.php').on('change', browsersync.reload)
}

exports.default = watch;

