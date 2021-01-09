const mix = require("laravel-mix");

mix.options({ processCssUrls: false });
mix.js("resources/js/app.js", "public/js").vue();
mix.sass("resources/sass/app.scss", "public/css");
// mix.browserSync("127.0.0.1:8000");
