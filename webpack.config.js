const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const glob = require('glob');
const TerserPlugin = require('terser-webpack-plugin');
const WebpackBar = require('webpackbar');
const rimraf = require('rimraf');

const srcPath = path.resolve(__dirname, 'src');

const jsFiles = glob.sync(path.resolve(srcPath, 'js/**/*.js'));

const excludedFileExtensions = []; // Add the file extensions you want to exclude

const cssFiles = glob.sync(path.resolve(srcPath, 'scss/**/*.scss')).filter((filePath) => {
  const fileName = path.basename(filePath);
  return !fileName.startsWith('_') && !excludedFileExtensions.some(ext => fileName.endsWith(ext));
});

const entry = {};

jsFiles.forEach((filePath) => {
  const entryName = path.basename(filePath, '.js');
  entry[`js/${entryName}`] = filePath;
});

cssFiles.forEach((filePath) => {
  const entryName = path.basename(filePath, '.scss');
  entry[`css/${entryName}`] = filePath;
});

module.exports = {
  entry: entry,
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, 'assets'),
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: 'babel-loader',
      },
      {
        test: /\.(sass|scss)$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
      },
      {
        test: /\.(png|jpg|gif)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name][ext]',
        },
      },
    ],
  },
  plugins: [
    new CleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [
        // 'assets/js/*',
        'assets/css/*',
        '!assets/css/homepage.css',
        '!assets/css/global.css'
      ],
    }),
    new MiniCssExtractPlugin({
      filename: '[name].min.css',
    }),
    new WebpackBar(),
    {
      apply: (compiler) => {
        compiler.hooks.afterEmit.tap('CleanJsInCssFolder', () => {
          const fs = require('fs');
          const jsFilesInCssFolder = fs.readdirSync(path.join(__dirname, 'assets/css'))
            .filter((file) => file.endsWith('.js'));

          jsFilesInCssFolder.forEach((jsFile) => {
            fs.unlinkSync(path.join(__dirname, 'assets/css', jsFile));
          });
        });
      },
    },
  ],
  optimization: {
    minimizer: [
      new TerserPlugin(),
      new CssMinimizerPlugin(),
    ],
  },
};