const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: ['class', '[data-mode="dark"]'],
    presets: [
        //
    ],
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/View/**/*.php',
        './vendor/step2dev/lazy-ui/src/Component/**/*.blade.php',
        './vendor/step2dev/lazy-ui/resources/views/*.blade.php',
        './app/Livewire/**/*Table.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Nunito', ...defaultTheme.fontFamily.sans],
                //         'serif': ['Roboto', ...defaultTheme.fontFamily.serif],
                //         'mono': ['Roboto', ...defaultTheme.fontFamily.mono],
                //         'body': ['Roboto'],
            },
            transitionProperty: {
                multiple: "width, height, backgroundColor, border-radius"
            }
        }
    },
    variants: {
        extend: {
            opacity: ['disabled']
        }
    },
    plugins: [
        // require('@tailwindcss/typography'),
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
        // require('@tailwindcss/aspect-ratio'),
        // require('@tailwindcss/typography'),
        require('daisyui')
    ],
    daisyui: {
        themes: [
            "light",
            "dark",
            "cupcake",
            "bumblebee",
            "emerald",
            "corporate",
            "synthwave",
            "retro",
            "cyberpunk",
            "valentine",
            "halloween",
            "garden",
            "forest",
            "aqua",
            "lofi",
            "pastel",
            "fantasy",
            "wireframe",
            "black",
            "luxury",
            "dracula",
            "cmyk",
            "autumn",
            "business",
            "acid",
            "lemonade",
            "night",
            "coffee",
            "winter",
        ],// true: all themes | false: only light + dark | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "dark", // name of one of the included themes for dark mode
        base: false, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    },
}
