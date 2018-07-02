const merge = require("webpack-merge");
const common = require('./webpack.common.js');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = merge(common, {
  mode: 'production',
  plugins: [
    new ExtractTextPlugin('style/[name].[hash:6].css'),
  ]
});
