var gulp        = require('gulp');
var sass        = require("gulp-sass");
var uglify      = require("gulp-uglify");
var concat      = require("gulp-concat");
var browserSync = require("browser-sync").create();
var connectPHP  = require('gulp-connect-php');
var reload      = browserSync.reload;

gulp.task('default', ['css','js','server','php-files','browserSync','watch']);

gulp.task('css', function () {
    return gulp.src('assets/scss/**/*.scss')
            .pipe(concat('style.min.css'))      // Arquivo único de saída
            .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
            .pipe(gulp.dest('./assets/css'));
});

gulp.task('js', function () {
    return gulp.src('./scripts/*')                         // Arquivos que serão carregados, veja variável 'js' no início
            .pipe(concat('script.min.js'))      // Arquivo único de saída
            .pipe(uglify())                     // Transforma para formato ilegível
            .pipe(gulp.dest('./assets/js/'));   // pasta de destino do arquivo(s)
});
 
gulp.task('server', function(){
    connectPHP.server({ base: './', keepalive:true, hostname: 'localhost', port:8999, open: false});
});

gulp.task('php-files', function(){
    return gulp.src('**/*.php')
    .pipe(reload({stream:true}));
});

gulp.task('browserSync', function() {
    browserSync.init({
        proxy:'localhost:8999'
    });
});

gulp.task('watch', function () {
    gulp.watch('./scripts/*', ['js'],browserSync.reload);
    gulp.watch('assets/scss/**/*.scss', ['css'],browserSync.reload);
    gulp.watch('**/*.php', ['php-files'],browserSync.reload);
});

