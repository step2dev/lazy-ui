import { readdirSync, readFileSync, statSync } from 'node:fs';
import { resolve } from 'node:path';

const root = resolve(new URL('../..', import.meta.url).pathname);
const css = readFileSync(resolve(root, 'build/lazy-ui.css'), 'utf8');

const requiredSelectors = [
    '.btn-soft',
    '.btn-dash',
    '.rating-half',
    '.mask-half-1',
    '.mask-half-2',
    '.modal-start',
    '.indicator-bottom',
    '.dock-xl',
    '.otp-primary',
    '.step-error',
    '.table-pin-cols',
    '.alert',
    '.aura',
    '.avatar',
    '.badge',
    '.breadcrumbs',
    '.btn',
    '.cally',
    '.card',
    '.carousel',
    '.chat',
    '.checkbox',
    '.collapse',
    '.countdown',
    '.diff',
    '.divider',
    '.dock',
    '.drawer',
    '.dropdown',
    '.fab',
    '.fieldset',
    '.file-input',
    '.filter',
    '.footer',
    '.hero',
    '.hover-3d',
    '.hover-gallery',
    '.indicator',
    '.input',
    '.join',
    '.kbd',
    '.label',
    '.list',
    '.loading',
    '.mask',
    '.megamenu',
    '.menu',
    '.mockup-browser',
    '.mockup-code',
    '.mockup-phone',
    '.mockup-window',
    '.modal',
    '.navbar',
    '.otp',
    '.progress',
    '.radial-progress',
    '.radio',
    '.range',
    '.rating',
    '.select',
    '.skeleton',
    '.stack',
    '.stat',
    '.stats',
    '.status',
    '.steps',
    '.swap',
    '.tabs',
    '.table',
    '.text-rotate',
    '.textarea',
    '.theme-controller',
    '.timeline',
    '.toast',
    '.toggle',
    '.tooltip',
    '.validator',
    '.validator-hint',
];

const daisyPrefixes = [
    'alert',
    'aura',
    'avatar',
    'badge',
    'breadcrumbs',
    'btn',
    'cally',
    'card',
    'carousel',
    'chat',
    'checkbox',
    'collapse',
    'countdown',
    'diff',
    'divider',
    'dock',
    'drawer',
    'dropdown',
    'fab',
    'fieldset',
    'file-input',
    'filter',
    'footer',
    'hero',
    'hover-3d',
    'hover-gallery',
    'indicator',
    'input',
    'join',
    'kbd',
    'label',
    'list',
    'loading',
    'mask',
    'megamenu',
    'menu',
    'mockup-browser',
    'mockup-code',
    'mockup-phone',
    'mockup-window',
    'modal',
    'navbar',
    'otp',
    'progress',
    'radial-progress',
    'radio',
    'range',
    'rating',
    'select',
    'skeleton',
    'stack',
    'stat',
    'stats',
    'status',
    'step',
    'steps',
    'swap',
    'tab',
    'tabs',
    'table',
    'text-rotate',
    'textarea',
    'theme-controller',
    'timeline',
    'toast',
    'toggle',
    'tooltip',
    'validator',
];

function filesIn(directory) {
    return readdirSync(directory).flatMap((entry) => {
        const path = resolve(directory, entry);

        if (statSync(path).isDirectory()) {
            return filesIn(path);
        }

        return [path];
    });
}

function isDaisyClass(token) {
    return daisyPrefixes.some((prefix) => token === prefix || token.startsWith(`${prefix}-`));
}

const phpFiles = filesIn(resolve(root, 'src')).filter((path) => path.endsWith('.php'));
const bladeFiles = filesIn(resolve(root, 'resources/views')).filter((path) => path.endsWith('.blade.php'));
const jsFiles = filesIn(resolve(root, 'resources/js')).filter((path) => path.endsWith('.js'));

const emittedClasses = new Set();

function addTokens(value) {
    for (const token of value.split(/\s+/)) {
        if (/^[a-z][a-z0-9-]*$/.test(token) && isDaisyClass(token)) {
            emittedClasses.add(token);
        }
    }
}

for (const path of [...phpFiles, ...jsFiles]) {
    const source = readFileSync(path, 'utf8');

    for (const match of source.matchAll(/['"]([^'"\n]+)['"]/g)) {
        addTokens(match[1]);
    }
}

for (const path of bladeFiles) {
    const source = readFileSync(path, 'utf8');

    for (const match of source.matchAll(/class\s*=\s*["']([^"']+)["']/g)) {
        addTokens(match[1]);
    }

    for (const block of source.matchAll(/@class\s*\(([\s\S]*?)\)/g)) {
        for (const match of block[1].matchAll(/['"]([^'"\n]+)['"]/g)) {
            addTokens(match[1]);
        }
    }
}

const selectors = new Set([
    ...requiredSelectors,
    ...[...emittedClasses].map((className) => `.${className}`),
]);

const missing = [...selectors].filter((selector) => !css.includes(selector));

if (missing.length) {
    console.error('Missing compiled Lazy UI classes:', missing.join(', '));
    process.exit(1);
}

console.log(
    `Tailwind/daisyUI smoke test passed (${selectors.size} selectors, ${emittedClasses.size} package-emitted daisyUI classes)`,
);
