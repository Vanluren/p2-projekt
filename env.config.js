const path = require('path');

module.exports = {
  PRODUCTION: false,
  HOT: true,
  THEME_NAME: 'Broomie',
  PROXY_TARGET: '/SkoleProjekter/p2-projekt/src',
  HOST: 'localhost',
  PORT: 8888,
  FILES: {
    inputJs: './src/assets/js/app.js',
    outputJs: 'app.compiled.js',
    inputSass: 'src/assets/styles/scss/app.scss',
    outputCss: './public/styles/',
  },
  PATHS: {
    src: unipath('src'),
    compiled: unipath(path.resolve(__dirname, 'public/js/')),
    modules: unipath('node_modules'),
    base: unipath('.'),
    css: unipath('css'),
  }
};

function unipath(base) {
  return function join() {
    const _paths = [base].concat(Array.from(arguments));
    return path.resolve(path.join.apply(null, _paths));
  }
}

function currentWorkigDir() {
	console.log(window.location);
}