'use strict';

const path = require('path');
const webpack = require("webpack");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const minifyHTML = {
  collapseInlineTagWhitespace: true,
  collapseWhitespace: true,
  minifyJS:true
}

module.exports = {
  entry: './source-src/main.js',
  output: {
    filename: '[name].[hash:6].js',
    publicPath: "./",
    path: path.resolve(__dirname, 'source')
  },

  devtool: 'inline-source-map',

  devServer: {
    contentBase: './source'
  },

  module: {
    rules: [{
      test: /\.(scss|sass|css)$/,
      use: ExtractTextPlugin.extract({
        fallback: "style-loader",
        use: [
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => {
                return [
                  require('autoprefixer')()
                ]
              }
            }
          },
          'sass-loader'
        ]
      })
    }]
  },

  plugins: [
    new ExtractTextPlugin('[name].[hash:6].css'),
    new CleanWebpackPlugin('source'),
    new HtmlWebpackPlugin({
      inject: false,
      cache:false,
      minify: minifyHTML,
      template: './source-src/script.ejs',
      filename: '../layout/_partial/script.ejs'
     }),
    new HtmlWebpackPlugin({
      inject: false,
      cache:false,
      minify: minifyHTML,
      template: './source-src/css.ejs',
      filename: '../layout/_partial/css.ejs'
    }),
    new webpack.NamedModulesPlugin(),
    new webpack.HotModuleReplacementPlugin()
  ],

  watch: true
};

if (process.env.NODE_ENV === 'production') {
  module.exports.plugins = (module.exports.plugins || []).concat([
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
    new webpack.optimize.UglifyJsPlugin({
      compress: {
        warnings: false
      }
    }),
    new webpack.optimize.OccurenceOrderPlugin(),
    new CleanPlugin('builds')
  ])
}
