var gulp = require('gulp')
var pug = require('gulp-pug')
var stylus = require('gulp-stylus')
var typescript = require('gulp-typescript')
var browserSync = require('browser-sync').create()

var src = './src'
var dist = './dist'

var input = {
    pages: `${src}/pages`,
    styles: `${src}/styles`,
    scripts: `${src}/scripts`
}

var output = {
    pages: `${dist}`,
    styles: `${dist}/styles`,
    scripts: `${dist}/scripts`
}

var pages = () => gulp.src(`${input.pages}/*.pug`)
    .pipe(pug({pretty: true}))
    .pipe(gulp.dest(`${output.pages}/`))
    .pipe(browserSync.stream())

var styles = () => gulp.src(`${input.styles}/*.styl`)
    .pipe(stylus())
    .pipe(gulp.dest(`${output.styles}/`))
    .pipe(browserSync.stream())

var scripts = () => gulp.src(`${input.scripts}/*.ts`)
    .pipe(typescript())
    .pipe(gulp.dest(`${output.scripts}/`))
    .pipe(browserSync.stream())

var watch = () => {

    browserSync.init({
        server: {
            baseDir: dist
        }
    })

    gulp.watch(`${input.pages}/**/*.pug`, pages)
    gulp.watch(`${input.styles}/**/*.styl`, styles)
    gulp.watch(`${input.scripts}/**/*.ts`, scripts)
    
    gulp.watch(`${input.pages}/**/*.pug`).on('change', browserSync.reload)
    gulp.watch(`${input.styles}/**/*.styl`).on('change', browserSync.reload)
    gulp.watch(`${input.scripts}/**/*.ts`).on('change', browserSync.reload)

}

exports.pages = pages
exports.styles = styles
exports.scripts = scripts
exports.watch = watch

exports.default = watch