var gulp = require('gulp'),
   // jshint = require('gulp-jshint'),
    sass = require('gulp-ruby-sass'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sourcemaps = require('gulp-sourcemaps');
    //webserver = require('gulp-webserver');

var env,
    sassSources,
    phpSources,
    imgSources,
    devDir,
    prodDir,
    outputDir,
    sassStyles;

devDir = 'builds/development/';
prodDir = 'builds/production/';
sassSources = [devDir + 'public/admin/css/*.scss', devDir + 'public/css/*.scss', devDir + 'public/**/css/*.scss'];
phpSources = [devDir + 'public/*.php', devDir + 'public/admin/*.php', devDir + 'includes/*.php', devDir + 'includes/layouts/*.php', devDir + 'public/**/*.php'];
jsSources = [devDir + 'public/js/*.js', devDir + 'public/**/js/*.js'];
imgSources = [devDir + 'public/img/*.*', devDir + 'public/**/img/*.*']

env = process.env.NODE_ENV || 'development';

if (env==='development') {
  outputDir = devDir;
  sassStyle = 'expanded';
} else {
  outputDir = prodDir;
  sassStyle = 'compressed';
}

//gulp.task('js', function() {
//  return gulp.src('builds/sassEssentials/js/myscript.js')
//    .pipe(jshint('./.jshintrc'))
//    .pipe(jshint.reporter('jshint-stylish'));
//});

gulp.task('sass-aor', function () {
    return sass(devDir + 'public/css/*.scss', {
      sourcemap: true,
      style: sassStyle
    })
    .on('error', function (err) {
        console.error('Error!', err.message);
    })
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(outputDir + 'public/css/'));
});

gulp.task('sass-admin', function () {
    return sass(devDir + 'public/admin/css/*.scss', {
      sourcemap: true,
      style: sassStyle
    })
    .on('error', function (err) {
        console.error('Error!', err.message);
    })
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(outputDir + 'public/admin/css/'));
});

gulp.task('sass-art', function () {
    return sass(devDir + 'public/**/css/*.scss', {
      sourcemap: true,
      style: sassStyle
    })
    .on('error', function (err) {
        console.error('Error!', err.message);
    })
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(outputDir + 'public/'));
});

gulp.task('php', function() {
  gulp.src(devDir + 'public/*.php')
   .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/')));
  gulp.src(devDir + 'public/admin/*.php')
   .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/admin/')));
   gulp.src(devDir + 'includes/*.php')
   .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'includes/')));
  gulp.src(devDir + 'includes/layouts/*.php')
   .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'includes/layouts/')));
  gulp.src(devDir + 'public/**/*.php')
   .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/')));
})

gulp.task('js', function() {
  gulp.src(devDir + 'public/js/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/js/')));

  gulp.src(devDir + 'public/**/js/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/')));

});

gulp.task('images', function() {
  gulp.src(devDir + 'public/img/*.*')
    .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/img')));
  
  gulp.src(devDir + 'public/**/img/*.*')
    .pipe(gulpif(env === 'production', gulp.dest(prodDir + 'public/')));    
})

gulp.task('watch', function() {
  //gulp.watch('builds/sassEssentials/js/**/*', ['js']);
  gulp.watch(sassSources, ['sass-aor', 'sass-admin', 'sass-art']);
  gulp.watch(phpSources, ['php']);
  gulp.watch(jsSources, ['js']);
  gulp.watch(imgSources, ['images']);
});

//gulp.task('webserver', function() {
//    gulp.src('builds/sassEssentials/')
//        .pipe(webserver({
//            livereload: true,
 //           open: true
 //       }));
//});

gulp.task('default', ['sass-aor', 'sass-admin', 'sass-art', 'php', 'watch', 'js', 'images']);
