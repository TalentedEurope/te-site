var path = require('path');

module.exports = {
    resolve: {
        modules: [
            path.resolve('./resources/assets/js'),
            path.resolve('./node_modules')
        ]
    },
    entry: './resources/assets/js/main.js',
    output: {
        path: '/public/js',
        filename: 'build.js'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel',
                exclude: /node_modules/
            },
            {
                test: /\.vue$/,
                loader: 'vue'
            }
        ]
    },
    vue: {
        loaders: {
            js: 'babel'
        }
    }
}
