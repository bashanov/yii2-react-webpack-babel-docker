const {src, dest, series} = require('gulp');
const sass = require('gulp-sass');
const outputDirectory = 'public/dist';

function sassTask() {
    return src(['src/scss/*.scss'])
        .pipe(sass())
        .pipe(dest(outputDirectory + '/css'));
}

function jsTask() {
    return src(['node_modules/bootstrap/dist/js/bootstrap.min.js'])
        .pipe(dest(outputDirectory + '/js'));
}

exports.default = series(sassTask, jsTask);