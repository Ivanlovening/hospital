var path = require('path');

module.exports = {
    entry: './cart.es6',
    output: {
        path: path.resolve(__dirname, '/var/www/html/trip/Public/Admin/js/es6/'),
        publicPath: '/public/',
        filename: 'build.js',
    },
    resolveLoader: 
        [{root: path.join(__dirname, 'node_modules')},
	{fallback: path.join(__dirname, "node_modules")}]

    ,
	resolve: {
        root : [
            path.join(__dirname+'/es6')
        ],
        extensions: ['', '.js', '.es6', '.vue']
    }
//resolveLoader: { fallback: path.join(__dirname, "node_modules") },
    ,module: {
        loaders: [
            {
                test: /\.vue$/,
                loader: 'vue'
            },
            {
                test: /\.js$/,
                loader: 'babel',
                exclude: /node_modules/
            },
            {
                test: /\.json$/,
                loader: 'json'
            },
            {
                test: /\.html$/,
                loader: 'vue-html'
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                loader: 'url',
                query: {
                    limit: 10000,
                    name: '[name].[ext]?[hash]'
                }
            }
            , {
                test: /\.(woff|svg|eot|ttf)\??.*$/,
                loader: 'url-loader?limit=50000&name=[path][name].[ext]'
            }
        ]
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true
    },
    devtool: '#eval-source-map'
}
