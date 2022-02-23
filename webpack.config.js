const webpack = require('webpack');
const { join, resolve } = require('path');
const HTMLWebpackPlugin  = require('html-webpack-plugin');
var path = require('path');
//const FaviconsWebpackPlugin = require('favicons-webpack-plugin')
//require('infinite-scroll');
require('es6-promise').polyfill();
//const{ axiosPlugin } = require('vue-axios-plugin');
module.exports= {
    entry: './src/index.js',
    output:{
        path: __dirname + '/dist',
        filename:'bundle.js'
    },
    module:{
        rules:[
            {
                test: /\.html$/,
                use: [
                    {
                        loader: "html-loader",
                        options: {
                            minimize: true
                        }
                    }
                ]
            },
            {
                test: /\.js$/,
                exclude:/node_modules/,
                use:{
                    loader:'babel-loader'
                }
            },
            {
                test:/\.(scss)$/,
                use:[
                    {
                        // Adds CSS to the DOM by injecting a `<style>` tag
                        loader: 'style-loader'
                    },
                    {
                        //interprets `@import` and `url()` like `import/require()` and will resolve them
                        loader:'css-loader'
                    },
                    {
                        //loader for webpack to process css with postcss
                        loader: 'postcss-loader',
                        options: {
                            plugins: function(){
                                return [
                                    require('autoprefixer')
                                ];
                            }
                        }
                    },
                    {
                        loader:'sass-loader'
                    }

                ]
            },
            { test: /\.(jpe?g|png|gif)$/i, loader:"file" },
        ]
    },
    resolve: {
        alias:{
            // bind version of jquery-ui
            "jquery-ui": "jquery-ui/jquery-ui.js",
            // bind to modules;
            modules: path.join(__dirname, "node_modules"),
        }
    },
    plugins:[
<<<<<<< HEAD
=======
        // new HTMLWebpackPlugin({
        //     template: "./src/index.html",
        //     filename: "./index.html"
        // }),
>>>>>>> 87babfc55b84a15c7f0bcd01714673ae4a4b47bc
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery":"jquery"
          })
    ]
};