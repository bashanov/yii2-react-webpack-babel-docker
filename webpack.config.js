const path = require('path');
const fs = require('fs');
const inputDirectory = path.join(__dirname, '/src/js/');
const outputDirectory = path.join(__dirname, '/public/dist/js');

let entries = {};
let files = fs.readdirSync(inputDirectory);
if (Array.isArray(files) && files.length) {
    files.forEach((file) => {
        if (file.split('.').pop() === 'js') {
            entries[file.split('.').slice(0, -1).join('.')] = inputDirectory + file.toLowerCase();
        }
    })
}

module.exports = {
    entry: entries,
    output: {
        path: outputDirectory,
        filename: "[name].js"
    },
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                options: {
                    presets: [
                        ['@babel/preset-env'],
                        ['@babel/preset-react'],
                    ]
                }
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            }
        ]
    }
};