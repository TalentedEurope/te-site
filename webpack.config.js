var path = require('path');

module.exports = {
    resolve: {
        alias: {vue: 'vue/dist/vue.js'},
        modules: [
            path.resolve('./resources/assets/js'),
            path.resolve('./node_modules')
        ]
    },
    entry: {
        main: './resources/assets/js/main.js',
        landing: './resources/assets/js/landing.js'
    },
    output: {
        path: '/public/js',
        filename: '[name]-build.js'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel',
                exclude: /node_modules/
            },
            {
                test: /\.css$/,
                loader: "style-loader!css-loader"
            },
        ]
    },
    vue: {
        loaders: {
            js: 'babel'
        }
    }
}
