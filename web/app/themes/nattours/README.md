# WP Nattours

**NOTE!** Pretty much everything here is about to change...

## Installation/Usage

1. Clone the repo to WP `themes`-dir, rename the cloned dir, `cd` into and remove `.git`
2. Search-and-replace all occurences on `Nattours` (the package name) and `nord_` (the function-prefix) to something project-specific
3. Change `package.json` config-section to suit your needs:
* `devUrl`: The development URL where webpack will be proxied to
* `proxyUrl`: accessible URL which BrowserSync watches
* `entry`: Scripts & styles which will be compiled to `/dist`-folder. Each entry will be compiled with the name specified with the objects `key`.

```json
"config": {
  "devUrl": "http://Nattours.dev",
  "proxyUrl": "http://localhost:3000",
  "entry": {
    "main": [
      "./scripts/main.js",
      "./styles/main.scss"
    ],
    "customizer": [
      "./scripts/customizer.js"
    ],
    "admin": [
      "./admin/backend.js",
      "./admin/backend.scss"
    ]
  }
}
```

4. Run `npm install` to install front-end-depencies
5. Run `npm start` to start `Webpack` to watch & rebuild on asset changes (You have to configure the configs `devUrl` to correctly proxy to `http://localhost:3000`)
6. To build for production, run `npm run prod` which compresses the scripts & styles, disables sourcemaps, copies images from `assets/images` to `dist/images` and creates most common favicons automatically to `icons`-subfolder.


#### Available npm-scripts:
* `npm start`: Start `webPack`
* `npm run prod`: Build assets for production
* `npm test`: Test scripts
* `npm run validate:dev`: validate webpack dev-config
* `npm run validate:prod`: validate webpack production-config

## Folder Structure

```
├── 1. assets
│   ├── admin
│   │   ├── backend.js
│   │   └── backend.scss
│   ├── build
│   ├── images
│   ├── js
│   │   ├── main
│   │   └── vendor
│   ├── styles
│   │   ├── common
│   │   ├── components
│   │   ├── layouts
│   │   ├── vendor
│   │   ├── editor-style.scss
│   │   └── main.scss
|
├── 2. library
│   ├── classes
│   │   ├── Breadcrumbs.php
│   │   ├── CPT-base.php
│   │   ├── Initalization.php
│   │   ├── Settings.php
│   │   ├── Utils.php
│   │   └── WP-navwalker.php
│   ├── custom-posts
│   ├── functions
│   ├── hooks
│   ├── lang
│   ├── metaboxes
│   └── widgets
|
├── 3. partials
│   ├── components
│   ├── content-excerpt.php
│   ├── content-page.php
│   ├── content-search.php
│   ├── content-single.php
│   ├── content.php
│   ├── no-results-404.php
│   ├── no-results-search.php
│   └── no-results.php
|
├── 4. templates
├── 5. custom-templates
├── .editorconfig
├── .eslintrc
├── .gitignore
├── functions.php
├── index.php
├── package.json
├── README.md
├── screenshot
└── style.css
```

**1. assets**
Place your images, styles & javascripts here (they get smushed and build to `build`-folder on gulp-process). Javascripts are build to `backend.min.js` (WP-admin-scripts), `vendor.min.js` (the vendor files from bower and `js/vendor`-dir) and `main.js.min` (the main js-file).

`styles`-dir is divided into smaller sections, each with it's responsibilities:
* `common`: Global functions, settings, mixins & fonts
* `components`: Single components, e.g. buttons, breadcrumbs, paginations etc.
* `layouts`: General layouts for header, different pages, sidebar(s), footer etc.
* `vendor`: 3rd. party components etc. which are not installed through bower or npm.

**2. library**
* `classes`: Holds the helper & utility-classes and is autorequired in `functions.php`
* `custom-posts`: Place your custom posts here. See example usage in `books.php.tpl`
* `functions`: The place for misc. helper functions
* `hooks`: The place for WP's `hooks`, `pre_get_posts` etc.
* `lang`: i18n for the theme
* `metaboxes`: Metabox-logic (CMB2 etc.) which is not tied to post-types can be added here
* `widgets`: WP-nav menus & widgets

**3. partials**
Partial files used by wrappers. Place additional partial components to `components`-folder

**4. templates**
Wordpress required template-files

**5. custom-templates**
Add your custom WP template-files here.

## Support

If you run into any trouble, ask ville.ristimaki@nordsoftware.com. He should know the correct answers. If not, you can always ask Niklas. He knows everything.

![niklas](http://testi.in/niklas.gif "Niklas knows everything")
