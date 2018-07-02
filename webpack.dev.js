const merge = require("webpack-merge");
const common = require('./webpack.common.js');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = merge(common, {
  mode: 'development',
  devtool: 'inline-source-map',
  output: {
    filename: 'js/[name].js',
  },
  plugins: [
    new ExtractTextPlugin('style/[name].css')
  ],
  watch: true
});

