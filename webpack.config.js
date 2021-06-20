const path = require('path');

module.exports = {
    mode: 'development',
    entry: './src/app.js',
    output: {
        filename: 'js.js',
        path: path.resolve(__dirname, 'src/assets')
    }


}
