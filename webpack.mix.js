const mix = require('laravel-mix');

const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');
const CaseSensitivePathsWebpackPlugin = require('case-sensitive-paths-webpack-plugin');

var webpackConfig = {
    plugins: [
        new VuetifyLoaderPlugin(),
        new CaseSensitivePathsWebpackPlugin(),
    ]
}

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');