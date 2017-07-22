var gulp = require('gulp');
var minify = require('gulp-uglify');
    gulp.task('default', function() {
        // 将你的默认的任务代码放在这
	console.log(1)
    });
gulp.task('goods', function(){
	//console.log(gulp.src('./goods.es6'))
//return ;
//	.pipe(minify())
//	.pipe(gulp.dest('./build/minified_templates'));
	gulp.src('./goods.es6').pipe(minify())
	.pipe(gulp.dest('./build'))
})
//gulp.src('goods.es6')
 
