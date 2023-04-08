var path = require('path');

module.exports = {
    entry: './app/Views/js/index.js',
    mode: 'production',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname,'./public/dist')
    },
    target: 'web'
}