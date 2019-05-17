var gulp = require('gulp');
var sass = require('gulp-sass');

var concat = require('gulp-concat'),
  rename = require('gulp-rename'),
  uglify = require('gulp-uglify-es').default;

gulp.task('scss', function() {
  gulp.src('src/scss/styles.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('../assets/css'));
});

gulp.task('scripts', function() {
  gulp.src('src/js/**/*.js')
    .pipe(concat('index.js'))
    .pipe(gulp.dest('../assets/js'))
    .pipe(rename('index.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../assets/js'));
});

var libs = [
  'node_modules/jquery/dist/jquery.min.js',
  'node_modules/bootstrap/dist/js/bootstrap.js',
  'node_modules/slick-carousel/slick/slick.js',
];

gulp.task('libs-scripts', function() {
  gulp.src(libs)
    .pipe(concat('libs-scripts.js'))
    .pipe(gulp.dest('../assets/js'))
    .pipe(rename('libs-scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../assets/js'));
});

gulp.task('default', function() {
  gulp.run("scss");
  gulp.run("scripts");
  gulp.run("libs-scripts");

  gulp.watch('src/scss/**/*.scss', function() {
    gulp.run('scss');
  });

  gulp.watch('src/js/**/*.js', function() {
    gulp.run('scripts');
  });
});
