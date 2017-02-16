var webpack = require('webpack');
var path = require('path');
var argv = require('minimist')(process.argv.slice(2));
var autoprefixer = require('autoprefixer');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var CopyWebpackPlugin = require('copy-webpack-plugin');
var WebpackCleanupPlugin = require('webpack-cleanup-plugin');
var FaviconsWebpackPlugin = require('favicons-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var ImageminPlugin = require('imagemin-webpack-plugin').default;
var imageminMozjpeg = require('imagemin-mozjpeg');
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
// var DashboardPlugin = require('webpack-dashboard/plugin');

var pkg = require('../../package.json');

var isProduction = !!((argv.env && argv.env.production) || argv.p);

/**
 * Common plugins
 * @type {*[]}
 */
var commonPlugins = [
  new CopyWebpackPlugin([
    {
      from: path.resolve(__dirname, '../images/**/*'),
      to: 'images',
      flatten: true
    }
  ], {

  }),
  new webpack.LoaderOptionsPlugin({
    minimize: isProduction,
    debug: !isProduction,
    stats: { colors: true },
    postcss: [
      autoprefixer({
        browsers: [
          'last 2 versions',
          'android 4',
          'opera 12',
        ],
      }),
    ],
    eslint: {
      failOnWarning: false,
      failOnError: true,
    },
  }),
  new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
    Tether: 'tether',
    'window.Tether': 'tether',
  }),
  new ImageminPlugin({
    disable: false,
    optipng: {
      optimizationLevel: 7,
    },
    gifsicle: {
      optimizationLevel: 3,
    },
    pngquant: {
      quality: '65-90',
      speed: 4,
    },
    svgo: {
      removeUnknownsAndDefaults: false,
      cleanupIDs: false,
    },
    jpegtran: null,
    plugins: [imageminMozjpeg({
      quality: 75,
    })]
  }),
  new ExtractTextPlugin({
    filename: 'styles/[name].css',
    allChunks: true,
  }),
];

/**
 * Develop plugins
 * @type {Array.<*>}
 */
var developPlugins = [
  // Disabled 'till the webpack-dev-server proxy is fixed :'(
  // new DashboardPlugin(),
  new BrowserSyncPlugin(
    {
      host: 'localhost',
      port: pkg.config.port,
      proxy: pkg.config.devUrl,
      open: false,
      files: ['{library,partials,templates}/**/*.php', '*.php'],
      logLevel: 'warn'
      // Don't notify abt reloading
      // notify: false,
      // Let webpack handle the reload
      // codeSync: false,
    }
  ),
  new webpack.optimize.OccurrenceOrderPlugin(),
  new webpack.NoErrorsPlugin()
];

/**
 * Production plugins
 * @type {Array.<*>}
 */
var productionPLugins = [
  new WebpackCleanupPlugin(),
  new webpack.optimize.DedupePlugin(),
  new webpack.optimize.OccurrenceOrderPlugin(),
  new webpack.optimize.UglifyJsPlugin({
    compressor: {
      warnings: false
    }
  }),
  new OptimizeCssAssetsPlugin({
    cssProcessorOptions: {
      discardComments: {
        removeAll: true
      }
    }
  }),
  new FaviconsWebpackPlugin({
    title: pkg.description,
    logo: path.resolve(__dirname, '../images/logo.png'),
    prefix: 'images/icons/',
    statsFilename: 'iconstats-[hash].json',
    icons: {
      android: true,              // Create Android homescreen icon. `boolean`
      appleIcon: true,            // Create Apple touch icons. `boolean` or `{ offset: offsetInPercentage }`
      appleStartup: false,        // Create Apple startup images. `boolean`
      coast: { offset: 25 },      // Create Opera Coast icon with offset 25%. `boolean` or `{ offset: offsetInPercentage }`
      favicons: true,             // Create regular favicons. `boolean`
      firefox: true,              // Create Firefox OS icons. `boolean` or `{ offset: offsetInPercentage }`
      windows: true,              // Create Windows 8 tile icons. `boolean`
      yandex: true                // Create Yandex browser icon. `boolean`
    }
  })
];

module.exports = {
  develop: commonPlugins.concat(developPlugins),
  production: commonPlugins.concat(productionPLugins)
};
