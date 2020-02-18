const gulp = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const nano = require('cssnano');
const prefixer = require('autoprefixer');

// include our imagemin library
const imagemin = require('gulp-imagemin');

// on a node engine, semicolons are optional (but it would go after done();)
// JS ignores white space

// define some common tasks for Gulp to run
// like compile and minify SASS files
function compile(done) {
    gulp.src('./sass/**/*.scss')
        .pipe(sass())
        .on('error', sass.logError)
        //postcss[] = array, asking it to pipe sass through prefixer, then minify it
        .pipe(postcss([prefixer(), nano()]))
        .pipe(gulp.dest('./css'))
        done()
}

// minify every image
function crunchImages(done) {
    gulp.src('./images/**')
        .pipe(imagemin())
        .pipe(gulp.dest('./dist/images/'))
        done()
}

exports.compile = compile;
exports.crunch = crunchImages;