// webpack.mix.js

let mix = require('laravel-mix');

mix.js('Resources/Assets/app.js', 'Javascript').vue().setPublicPath('Resources/Public');