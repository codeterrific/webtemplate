# CODETERRIFIC Wordpress Template
This repository contains the wordpress template used for
[codeterrific.com](http://www.codeterrific.com).

## CSS Modifications/Addidions
The CSS-file `style.css` is **not** to be edited direcly, but compiled from the
LESS-file (`style.less`) -- thus all changes to the CSS are to be made in
`style.less`, compiled to CSS and then uploaded.

LESS is a more powerful language than pure CSS, allowing variables, math-functions, 
custom functions/macros and much more. See [lesscss.org](http://lesscss.org/) for
instructions on installation- and usage.

### LESSC (LESS compiler)
If you have `lessc` installed, compiling the LESS-file to CSS is done by executing
the following command:

```bash
lessc style.less style.css
```

or, to compress the generated CSS:
```bash
lessc -x style.less style.css
```
*Note: the compression flag is deprecated and it is recommended to use a dedicated
CSS minifier instead, for instance see less-plugin-clean-css*

