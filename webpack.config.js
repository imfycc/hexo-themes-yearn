
'use strict';

const path = require('path');
const webpack = require("webpack");
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
    filename: '[name].[chunkhash:6].js',
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
       new ExtractTextPlugin('[name].[chunkhash:6].css'),
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
    devServer: {
      contentBase: path.join(__dirname, "source-src"),
      compress: true,
      port: 9000,
      hot: true
    }
};
