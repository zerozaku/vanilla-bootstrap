[![Bootstrap for Vanilla](screenshot.png)](https://github.com/kasperisager/vanilla-bootstrap)

This is a fork of kasperisager's [Vanilla Bootstrap](https://github.com/kasperisager/vanilla-bootstrap) theme. It's probably in your best interest to use the original because ours is tailored to our specific use-case, and we aren't supporting other use-cases. You're free to use it anyway, but you should expect to run into problems.

## Included themes

![Default](design/screenshot_default.png)
![Bootstrap](design/screenshot_bootstrap.png)
![Cosmo](design/screenshot_cosmo.png)
![Darkly](design/screenshot_darkly.png)

## Compiling assets

The following instructions assume that you have already installed Node.js on your computer. If this is not the case, please download and install the latest stable release from the official [Node.js download page](http://nodejs.org/download/). If you are using [Homebrew](http://brew.sh/), you can also install Node.js via the command line:

```sh
$ brew install node
```

> __Notice__: It is important that you install Node in a way that does not require you to `sudo`.

Once you have Node.js up and running, you will need to install the local dependencies using [npm](http://npmjs.org):

```sh
$ npm install
```

### Tasks

#### Build - `npm run build`
Compiles all theme assets using Gulp. LESS stylesheets will be compiled to [`design/style.css`](design/style.css) and Javascripts will be concatenated and output to [`js/custom.js`](js/custom.js).

#### Watch - `npm run watch`
Watches the assets for changes and runs the appropriate Gulp tasks. Also starts a Livereload server that will push the changes to your Vanilla installation automatically.

---

Copyright &copy; 2014 [Kasper Kronborg Isager](https://github.com/kasperisager). Licensed under the terms of the [MIT License](LICENSE.md)
