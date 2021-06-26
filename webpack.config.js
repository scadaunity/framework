const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: './resources/app.js',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public')
    },
    module:{
      rules:[
        {
          test:/\.js$/,
          loader:'babel-loader',
          exclude: /node_modules/
        },
        {
          test: /\.css$/i,
          include: path.resolve(__dirname, 'resouces/assets/'),
          use: ['style-loader', 'css-loader', 'postcss-loader'],
        },
      ]
    },
    plugins:[
      new HtmlWebpackPlugin({
        filename:'index.php',
        template:'public/index.php'
      })
    ]


}
