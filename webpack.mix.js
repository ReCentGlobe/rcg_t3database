// webpack.mix.js

let mix = require('laravel-mix');

mix.js('Resources/Assets/Scripts/app.js', 'Javascript').vue().setPublicPath('Resources/Public');