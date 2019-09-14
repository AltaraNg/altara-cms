function defaultFilter(){
    return true
}

function identity(xmlObj){
    return xmlObj
}

var defaultParseOptions = {
    trim: true,
    async: true,
    strict: false,
    normalize: false,
    explicitChildren: true,
    preserveChildrenOrder: true
}

var defaultStringifyOptions = {}


/*let mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            moment$: 'moment/moment.js'
        }
    }
});

mix.js(['resources/assets/js/app.js'], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .options({processCssUrls: false})
    .autoload({
        jquery: ['$', 'window.jQuery', "jQuery", "window.$", "jquery", "window.jquery"]
    }).version();*/


let mix = require('laravel-mix');
mix.js(['resources/assets/js/app.js', 'resources/assets/js/argon.js'], 'public/js/app.js').version();
mix.sass('resources/assets/sass/app.scss', 'public/css').version();
mix.options({processCssUrls: false});
//mix.version();
mix.webpackConfig({
    module: {
        rules: [{
            test: /\.svg$/,
            use: [
                {loader: 'file-loader'},
                {loader: 'svgo-loader'},
                {loader: 'xml-fix-loader'}
            ]
        }, {
            test: /\.xml/,
            use: [
                {
                    loader: 'file-loader'
                },
                {
                    loader: 'xml-fix-loader',
                    options: {

                        //this will be pased to "xml2js.parseString(parse || defaultParseOptions)"
                        parse: defaultParseOptions,

                        // this will be passed to "new xml2js.Builder(stringify || defaultStringifyOptions)"
                        stringify: defaultStringifyOptions,

                        // filter resources based on their resourcename
                        filterResource: defaultFilter,

                        // filter resources based on their resourcename
                        filterContent: defaultFilter,

                        // filter resources based on their resourcename
                        filterParsedContent: defaultFilter,

                        // filter resources based on their resourcename
                        changeXmlObj: identity

                    }
                }
            ]
        }
        ]
    }
});