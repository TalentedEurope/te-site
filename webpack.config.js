var path = require('path');
var webpack = require('webpack');

module.exports = {
    resolve: {
        alias: {vue: 'vue/dist/vue.js'},
        modules: [
            path.resolve('./resources/assets/js'),
            path.resolve('./node_modules')
        ]
    },
    entry: {
        main: ['babel-polyfill', './resources/assets/js/main.js'],
        landing: './resources/assets/js/landing.js'
    },
    output: {
        path: '/public/js',
        filename: '[name]-build.js'
    },
    plugins: [
        new webpack.ContextReplacementPlugin(/moment[\/\\]locale$/, /es|fr|it|de|sk/)
    ],
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
