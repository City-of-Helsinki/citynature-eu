var path = require('path');
var qs = require('qs');
var argv = require('minimist')(process.argv.slice(2));
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var config = require('../../package.json').config;

var isProduction = !!((argv.env && argv.env.production) || argv.p);
var sourceMapQueryStr = !isProduction ? '+sourceMap' : '-sourceMap';
var publicPath = `/${path.dirname(process.cwd()).split(path.sep).slice(-2).concat(path.basename(process.cwd())).join('/')}/dist/`;
var entries = {};
Object.keys(config.entry).forEach(function (id) {
  entries[id] = config.entry[id];
});

module.exports = {
  entry: entries,
  output: {
    path: path.resolve(__dirname, '../../dist'),
    publicPath: publicPath,
    filename: 'scripts/[name].min.js',
    sourceMapFilename: '[name].[hash].js.map',
    chunkFilename: '[id].chunk.js'
  },
  resolve: {
    extensions: ['.js', '.html'],
    alias: {
      src: path.resolve(__dirname, '../'),
      assets: path.resolve(__dirname, '../assets')
    },
  },
  // TODO: FIXME! PLZ!
  // devServer: {
  //   autoRewrite: true,
  //   inline: true,
  //   proxy: {
  //     '*': {
  //       target: {
  //         host: 'wpdemo.dev',
  //         protocol: 'http',
  //         port: 80
  //       },
  //       ignorePath: true,
  //       changeOrigin: true,
  //       secure: false
  //     },
  //   },
  // },
  externals: {
    jquery: 'jQuery'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        loader: 'eslint',
        include: path.resolve(__dirname, '../'),
        exclude: /node_modules/
      },
      {
        test: /\.js$/,
        exclude: [/(node_modules)(?![/|\\](bootstrap|foundation-sites))/],
        loaders: [{
          loader: 'babel',
          query: {
            presets: [[path.resolve('./node_modules/babel-preset-es2015'), { modules: false }]],
            cacheDirectory: true,
          }
        }]
      },
      {
        test: /\.css$/,
        include: path.resolve(__dirname, '../'),
        loader: ExtractTextPlugin.extract({
          fallbackLoader: 'style',
          loader: [
            `css?${sourceMapQueryStr}`,
            // 'postcss',
          ],
        }),
      },
      {
        test: /\.scss$/,
        include: path.resolve(__dirname, '../'),
        loader: ExtractTextPlugin.extract({
          fallbackLoader: 'style-loader',
          loader: [
            `css?${sourceMapQueryStr}`,
            // 'postcss',
            `resolve-url?${sourceMapQueryStr}`,
            `sass?${sourceMapQueryStr}`,
          ],
        }),
      },
      {
        test: /\.(png|jpe?g|gif|svg|xml|json)$/,
        include: path.resolve(__dirname, '../'),
        loaders: [
          `file?${qs.stringify({
            name: '[path][name].[ext]',
          })}`
        ]
      },
      {
        test: /\.(ttf|eot)$/,
        include: path.resolve(__dirname, '../'),
        loader: `file?${qs.stringify({
          name: 'vendor/[name].[ext]'
        })}`
      },
      {
        test: /\.woff2?$/,
        include: path.resolve(__dirname, '../'),
        loader: `url?${qs.stringify({
          limit: 10000,
          mimetype: 'application/font-woff',
          name: 'vendor/[name].[ext]'
        })}`
      },
      {
        test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg)$/,
        include: /node_modules/,
        loader: 'file',
        query: {
          name: 'vendor/[name].[ext]'
        }
      }
    ]
  }
};
