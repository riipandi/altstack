/*

Tailwind - The Utility-First CSS Framework

A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink),
David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).

Welcome to the Tailwind config file. This is where you can customize
Tailwind specifically for your project. Don't be intimidated by the
length of this file. It's really just a big JavaScript object and
we've done our very best to explain each section.

View the full documentation at https://tailwindcss.com.

|-------------------------------------------------------------------------------
| The default config
|-------------------------------------------------------------------------------
|
*/

let defaultConfig = require('tailwindcss/defaultConfig')()

module.exports = {

    /*
    |-----------------------------------------------------------------------------
    | Fonts                                    https://tailwindcss.com/docs/fonts
    |-----------------------------------------------------------------------------
    */
    fonts: {
        'sans': [
            'Nunito',
            'system-ui',
            'Segoe UI',
            'BlinkMacSystemFont',
            '-apple-system',
            'Roboto',
            'Oxygen',
            'Ubuntu',
            'Cantarell',
            'Fira Sans',
            'Droid Sans',
            'Helvetica Neue',
            'sans-serif',
        ],
        'serif': [
            'Constantia',
            'Lucida Bright',
            'Lucidabright',
            'Lucida Serif',
            'Lucida',
            'DejaVu Serif',
            'Bitstream Vera Serif',
            'Liberation Serif',
            'Georgia',
            'serif',
        ],
        'mono': [
            'Menlo',
            'Monaco',
            'Consolas',
            'Liberation Mono',
            'Courier New',
            'monospace',
        ],
    }

}
