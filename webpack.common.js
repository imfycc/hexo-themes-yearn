'use strict';

const path = require('path');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
const HtmlWebpackPlugin = require('html-webpack-plugin');

// https://github.com/kangax/html-minifier#options-quick-reference
const minifyHTML = {
  collapseInlineTagWhitespace: true,
  collapseWhitespace: true,
  minifyJS: true
}

module.exports = {
  entry: './source-src/main.js',
  output: {
    filename: 'js/[name].[hash:6].js',
    publicPath: "./",
    path: path.resolve(__dirname, 'source')
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
    new CleanWebpackPlugin(['source/js', 'source/style']),
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
    })
  ],

  optimization: {
    minimizer: [
      new UglifyJsPlugin()
    ]
  }
};

