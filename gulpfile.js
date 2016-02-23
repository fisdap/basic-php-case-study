var gulp = require('gulp'),
sourcemaps = require('gulp-sourcemaps'),
uglify = require('gulp-uglify'),
concat = require('gulp-concat')
cssnano = require('gulp-cssnano'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer');

var js_files = [

];

var scss_files = [

];

gulp.task('scss', function() {
   return gulp.src(scss_files)
     .pipe(sourcemaps.init())
     .pipe(sass())
     .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
      }))
     .pipe(concat("bundle.min.css"))
     .pipe(cssnano())
     .pipe(sourcemaps.write('.'))
     .pipe(gulp.dest('public/dist/'));
});

gulp.task('js', function() {
  return gulp.src(js_files)
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('public/dist/'));
});

gulp.task('build', ['js']);

gulp.task('watch', ['js', 'scss'], function() {
  gulp.watch('resources/assets/js/**/*.js', ['js']);
  gulp.watch('resources/assets/scss/**/*.scss', ['scss']);
});
