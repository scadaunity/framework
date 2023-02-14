var path = require('path');

module.exports = {
    entry: './app/Views/js/main.js',
    mode: 'development',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname,'./public')
    },
    target: 'web'
}