const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: './src/app.js',
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
        }
      ]
    },
    plugins:[
      new HtmlWebpackPlugin({
        filename:'index.php',
        template:'public/index.php'
      })
    ]


}
