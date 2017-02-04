import gulp from 'gulp';
import gutil from 'gulp-util';
import browserify from 'browserify';
import babelify from 'babelify';
import sass from 'gulp-sass';
import spritesmith from 'gulp.spritesmith';
import source from 'vinyl-source-stream';
import rename from'gulp-rename';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';

gulp.task('sass', () => {
    return gulp.src('resources/assets/sass/*.scss')
        .pipe(sass({
            outputStyle: 'compressed',
            includePaths: [
                'node_modules/normalize-scss/sass', 
                'node_modules/sass-rem',
            ]
        }))
        .pipe(rename({
            suffix: '.min'
        }))
        .on('error', function(err){
            gutil.log(gutil.colors.red.bold('[sass error]'));
            gutil.log(err.message);
            this.emit('end');
        })
        .pipe(gulp.dest('public/css'))
});
 
gulp.task('jsx', () => {
    return browserify({
            entries: 'resources/assets/jsx/app.jsx',
            extensions: ['.jsx'],
            debug: true
        })
        .transform('babelify', {
            presets: ['es2015', 'react'],
            plugins: ['transform-class-properties']
        })
        .bundle()
        .on('error', function(err){
            gutil.log(gutil.colors.red.bold('[browserify error]'));
            gutil.log(err.message);
            this.emit('end');
        })
        .pipe(source('bundle.js'))
        .pipe(gulp.dest('public/js'));
});

gulp.task('sprite', function () {
    gulp.src('resources/assets/img/sprite-source/*.png').pipe(spritesmith({
        imgName: 'public/img/sprite.png',
        imgPath: '/img/sprite.png',
        cssName: 'resources/assets/sass/_sprite.scss'
    }))
    .on('error', function(err){
        gutil.log(gutil.colors.red.bold('[spritesmith error]'));
        gutil.log(err.message);
        this.emit('end');
    })
    .pipe(gulp.dest('./'));
});

gulp.task('js-uglify', function() {
    gulp.src('public/js/**/*.js')
        .on('error', function(err){
            gutil.log(gutil.colors.red.bold('[uglify error]'));
            gutil.log(err.message);
            this.emit('end');
        })
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest('public/js/dist'));
});
 
gulp.task('watch', () => {
    gulp.watch('resources/assets/jsx/**/*.jsx', ['jsx']);
    gulp.watch('resources/assets/sass/*.scss', ['sass']);
});
 
gulp.task('default', ['watch']);