const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        index: ['./css/index.scss']
    },
    mode: 'production',
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: 'mod_einsatz_latest.js'
    },

    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [{
                    loader: MiniCssExtractPlugin.loader
                }, {
                    loader: 'css-loader'
                }, {
                    loader: 'postcss-loader',
                    options: {
                        postcssOptions: {
                            plugins: () => [require('autoprefixer')]
                        }
                    }
                }, {
                    loader: 'sass-loader'
                }]
            }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: '../css/mod_einsatz_latest.css'
        })
    ]
};
