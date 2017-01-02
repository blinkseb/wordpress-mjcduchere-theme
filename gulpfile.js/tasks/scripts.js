// ==== SCRIPTS ==== //

var gulp        = require('gulp'),
    plugins     = require('gulp-load-plugins')({ camelize: true }),
    merge       = require('merge-stream'),
    config      = require('../../gulpconfig').scripts;

// Check core scripts for errors
gulp.task('scripts-lint', function() {
  return gulp.src(config.lint.src)
  .pipe(plugins.jshint())
  .pipe(plugins.jshint.reporter('default')) // No need to pipe this anywhere
  .pipe(gulp.dest(config.dest));
});

// Minify scripts in place
gulp.task('scripts-minify', ['scripts-lint'], function() {
  return gulp.src(config.minify.src)
  .pipe(plugins.sourcemaps.init())
  .pipe(plugins.uglify(config.minify.uglify))
  .pipe(plugins.sourcemaps.write('./'))
  .pipe(gulp.dest(config.dest));
});

// Master script task; lint -> bundle -> minify
gulp.task('scripts', ['scripts-minify']);
