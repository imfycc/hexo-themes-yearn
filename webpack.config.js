
'use strict';

const path = require('path');
const webpack = require("webpack");
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: './source-src/main.js',
  output: {
    filename: '[name].[chunkhash:6].js',
    path: path.resolve(__dirname, 'source')
  },
  module: {
        rules: [{
            test: /\.css$/,
            use: ExtractTextPlugin.extract({
              use: 'css-loader'
            })
        }]
    },
    plugins: [
       new ExtractTextPlugin('styles.css'),
    ]
};
