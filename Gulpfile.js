var gulp = require('gulp');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');

var files_source = "./assets/js/*.js";
var files_dest = "../js";

gulp.task( 'default', function() {
  gulp.run( 'lint', 'dist' );
} );

gulp.task( 'lint', function() {
  gulp.src( files_source )
    .pipe( jshint() )
    .pipe( jshint.reporter( 'default' ) )
} );

gulp.task( 'dist', function() {
  gulp.src( files_source )
    .pipe( concat( files_dest ) )
    .pipe( rename(function (path) {
        path.suffix += ".min.js";
    } ))
    .pipe( uglify() )
    .pipe( gulp.dest( files_dest ) );
} );
