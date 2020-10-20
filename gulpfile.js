/**
 * Configuration for Gulp. Based largely on Sage by Roots.
 */
  
const timestamps   = require('./assets/last-edited.json');

let hostname = 'http://localhost';



/**
 * Global modules
 */
const argv         = require('minimist')(process.argv.slice(2));
const beeper       = require('beeper');
const browsersync  = require('browser-sync').create();
const flatten      = require('gulp-flatten');
const gulp         = require('gulp');
const del          = require('del');
const gulpif       = require('gulp-if');
const imagemin     = require('gulp-imagemin');
const plumber      = require('gulp-plumber');
const sass         = require('gulp-sass');
const sourcemaps   = require('gulp-sourcemaps');
const uglify       = require('gulp-uglify');
const rename       = require('gulp-rename');
const svgstore     = require('gulp-svgstore');
const file         = require('gulp-file');
const babel        = require('gulp-babel');
const postcss      = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano      = require('cssnano');

/**
 * Asset paths
 */
const path = {
    "base" : {
        "source": "assets/",
        "dist":   "dist/",
    },
    "scripts" : {
        "base": "assets/scripts/",
        "files": [
            {
                "source": "assets/scripts/*.js",
                "dist": "dist/scripts/"
            },
            {
                "source": "assets/scripts/pages/*.js",
                "dist": "dist/scripts/pages/"
            },
            {
                "source": "assets/scripts/vendor/*.js",
                "dist": "dist/scripts/vendor/"
            },
        ]
    },
    "styles" : {
        "base": "assets/styles/",
        "files": [
            {
                "source": "assets/styles/*.scss",
                "dist": "dist/styles/"
            },
            {
                "source": "assets/styles/pages/*.scss",
                "dist": "dist/styles/pages/"
            },
        ]
    },
    "fonts" : {
        "source": "assets/fonts/",
        "dist":   "dist/fonts/",
    },
    "images" : {
        "source": "assets/images/",
        "dist":   "dist/images/",
    },
    "sprite" : {
        "source": "assets/sprite/",
        "dist":   "dist/sprite/",
    },
    "favicon" : {
        "source": "assets/favicon/",
        "dist":   "dist/favicon/",
    }
};

/**
 * Disable or enable features
 */
let production = argv.production;

/**
 * Timestamps
 *
 * Update asset class timestamp to last-edited.json
 */
const updateTimestamp = (stamp) => {
    timestamps[stamp] = Date.now();
    return file(
        'last-edited.json',
        JSON.stringify(timestamps, null, 2),
        {src: true}
    )
    .pipe(gulp.dest('./assets'));
};

/**
 * Task: Styles
 *
 * Compiles, combines, and optimizes Bower CSS and project CSS.
 * By default this task will only log a warning if a precompiler error is
 * raised. If the `--production` flag is set: this task will fail outright.
//  */
gulp.task('styles', () => {
    updateTimestamp('css');
        
    let stream;

    path.styles.files.forEach(function (item) {
  
      stream = gulp.src(item.source)

                .pipe(gulpif(!production, plumber()))

                .pipe(gulpif(!production, sourcemaps.init()))

                .pipe(sass())

                .pipe(postcss([ autoprefixer(), cssnano() ]))

                .pipe(gulpif(!production, sourcemaps.write()))

                .pipe(gulp.dest(item.dist))

                .pipe(browsersync.stream({match: '**/*.css'}));
      
    });

    return stream;
});
  
/**
 * Task: Scripts
 *
 * Compiles, combines, and optimizes JS.
 */
gulp.task('scripts', () => {
    updateTimestamp('js');
    
    let stream;

    path.scripts.files.forEach(function (item) {
  
      stream = gulp.src(item.source)
      
                .pipe(gulpif(!production, sourcemaps.init()))

                .pipe(babel({
                    presets: ['@babel/env']
                }))
                
                .pipe(uglify())
                
                .on('error', function(err) {
                    beeper();
                    console.log(err);
                })

                .pipe(gulpif(!production, sourcemaps.write()))

                .pipe(gulp.dest(item.dist))

                .pipe(browsersync.stream({match: '**/*.js'}))
    });

    return stream;
});

/**
 * Task: Fonts
 *
 * Grabs all the fonts and outputs them in a flattened directory
 * structure. See: https://github.com/armed/gulp-flatten
 */
gulp.task('fonts', () => {
    return gulp.src([path.fonts.source + '**/*'])
        // flatten directory structures
        .pipe(flatten())
        // send to /dist/fonts/
        .pipe(gulp.dest(path.fonts.dist))
        // browsersync result
        .pipe(browsersync.stream());
});

/**
 * Task: Images
 *
 * Run lossless compression on all the images.
 */
gulp.task('images', () => {
    return gulp
        .src([path.images.source + '**/*'])
        // optimize images
        .pipe(
            imagemin({
                progressive: true,
                interlaced: true,
                svgoPlugins: [
                    {removeUnknownsAndDefaults: false},
                    {cleanupIDs: false},
                    {removeDimensions: true}
                ]
            })
        )
        // send to /dist/images
        .pipe(gulp.dest(path.images.dist))
        // browsersync result
        .pipe(browsersync.stream());
});

/**
 * Task: Svgstore
 *
 * Create a single sprite.svg file from files in /assets/sprite/.
 */
gulp.task('svgstore', () => {
    updateTimestamp('svg');

    return gulp.src(path.sprite.source + '*.svg')
    // rename SVG IDs by "icon-filename"
    .pipe(rename({prefix: 'icon-'}))
    // optimize SVG
    .pipe(imagemin([
        imagemin.svgo({
            plugins: [
                {
                    removeViewBox: false,
                    collapseGroups: true
                }
            ]
        })
    ]))
    // store SVG into sprite
    .pipe(svgstore())
    .pipe(gulp.dest(path.sprite.dist))
    // browsersync result
    .pipe(browsersync.stream());
});
  
/**
 * Task: Favicon
 *
 * Run lossless compression for favicons.
 */
gulp.task('favicon', () => {
    return gulp.src([path.favicon.source + '**/*'])
        // optimize images
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            svgoPlugins: [
                {removeUnknownsAndDefaults: false},
                {cleanupIDs: false},
                {removeDimensions: true}
            ]
        }))
        // send to /dist/favicon
        .pipe(gulp.dest(path.favicon.dist));
});
  
/**
 * Task: Clean
 *
 * Deletes the build folder entirely.
 */
gulp.task('clean', () => {
    return del(path.base.dist);
});

/**
 * Task: Watch
 *
 * Use BrowserSync to proxy your dev server and synchronize code
 * changes across devices. Specify the hostname of your dev server at
 * `hostname`. When a modification is made to an asset, run the
 * build step for that asset and inject the changes into the page.
 * See: http://www.browsersync.io
 */
gulp.task('watch', () => {
    // browsersync changes
    browsersync.init({
        files: [
            '**/*.php', '*.php'
        ],
        proxy: hostname,
        open: false,
        reloadOnRestart: true,
    });

    // watch these files
    gulp.watch(path.styles.base + '**/*', gulp.task('styles'));
    gulp.watch(path.scripts.base + '**/*', gulp.task('scripts'));
    gulp.watch(path.fonts.source + '**/*', gulp.task('fonts'));
    gulp.watch(path.images.source + '**/*', gulp.task('images'));
    gulp.watch(path.sprite.source + '*', gulp.task('svgstore'));
    gulp.watch(path.favicon.source + '*', gulp.task('favicon'));
});
  
/**
 * Task: Build
 *
 * `gulp build` - Run all the build tasks but don't clean up beforehand.
 * Generally you should be running `gulp` instead of `gulp build`.
 */
gulp.task('build', gulp.series(
    gulp.parallel('scripts', 'styles', 'fonts', 'images', 'svgstore', 'favicon')
));
  
/**
 * Task: Default
 *
 * `gulp` - Run a complete build. To compile for production run `gulp --production`.
 */
gulp.task('default', gulp.series('clean', 'build'));
  