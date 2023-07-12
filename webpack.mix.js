
const mix = require('laravel-mix')


mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);













//import { defineConfig } from 'vite';
//import laravel from 'laravel-vite-plugin';

//export default defineConfig({
  //  plugins: [
   //   laravel({
         //   input: ['resources/css/app.css', 'resources/js/app.js','public/js'],
        //    refresh: true,
      //  }),
 ///  ],
//});

