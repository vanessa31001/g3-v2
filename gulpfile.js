const {
    src,
    dest,
    series,
    parallel,
    watch,
    task
} = require('gulp');

//sass 轉譯
const sass = require('gulp-sass');

function styleSass() {
    return src('./sass/*.scss')
        .pipe(sass({
            outputStyle: 'compressed' // expanded
        }).on('error', sass.logError))
        .pipe(dest('./css'));
}


// =======  8.加入 gulp-clear =======
//清除檔案
const clean = require('gulp-clean');

function cleanfile() {
    return src('./css', {
            read: false,
            allowEmpty: true 
        }) //避免 gulp 去讀取檔案內容，讓刪除料能變好
        .pipe(clean());
}

// =======  9.加入 gulp-file-include =======


const fileinclude = require('gulp-file-include');
const gulpClean = require('gulp-clean');

//html 樣板
function filehtml() {
    return src('./app/*.html')//路徑
    .pipe(fileinclude({
        prefix: '@@',
        basepath: '@file'
    })).pipe(dest('./'))
}

exports.default =  function watchtask() {
    watch(['./app/*.html' , './app/**/*.html'] , filehtml); //監看，路徑你可以自己調整，後面是去執行filehtml這個function
    watch(['./sass/*.scss' , './sass/**/*.scss'] , series( cleanfile, styleSass)); //先執行cleanfile -> styleSass
}



