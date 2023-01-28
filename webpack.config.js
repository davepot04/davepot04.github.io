const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
var webpack = require('webpack');

let htmlPageNames = [''];
// let multipleHtmlPlugins = htmlPageNames.map(name => {
//   return new HtmlWebpackPlugin({
//     template: `./src/${name}.html`,
//     filename: `${name}.html`,
//     chunks: [`${name}`]
//   })
// });

module.exports = {
  mode: 'development',
  devtool: 'source-map',
  entry: {
    index: './src/index.js',
  },
  watch: true,
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: "./src/index.html",
      chunks: ['index']
    })
  ]
  // .concat(multipleHtmlPlugins)
};