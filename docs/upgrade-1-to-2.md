# Upgrade from Lazy UI 1.x to 2.x

Lazy UI 2.x is a major frontend migration.

| Lazy UI | Tailwind CSS | daisyUI | Quill |
| --- | --- | --- | --- |
| 1.x | 3.x | 4.x | 1.x |
| 2.x | 4.x | 5.x | 2.x |

Lazy UI 1.x remains the maintenance line for projects that need Tailwind CSS 3 or daisyUI 4.

## Before upgrading

Create a branch and make sure the current application builds before changing dependencies.

```bash
git switch -c upgrade/lazy-ui-2
composer test
npm run build
```

Tailwind CSS 4 targets modern browsers. If the application must support browsers older than Safari 16.4, Chrome 111, or Firefox 128, keep Lazy UI 1.x for now.

## 1. Upgrade the Composer package

While 2.x is under development:

```bash
composer require step2dev/lazy-ui:"dev-2.x-dev" -W
```

After a stable 2.x release, use the normal major constraint:

```bash
composer require step2dev/lazy-ui:^2.0 -W
```

## 2. Upgrade frontend dependencies

Lazy UI 2.x uses:

- `tailwindcss ^4`
- `daisyui ^5`
- `@tailwindcss/postcss ^4`
- `@tailwindcss/forms`
- `quill ^2.0.3`

Run the installer:

```bash
php artisan lazy-ui:install-package
```

The installer is conservative and does not overwrite existing `postcss.config.js`, `resources/css/lazy.css`, or `resources/js/lazy.js`. Existing 1.x projects therefore need to migrate those files manually when they already exist.

If Sass or Autoprefixer were installed only for the old Lazy UI pipeline, they are no longer required by Lazy UI 2.x. Do not remove them if the application still uses them elsewhere.

## 3. Replace the old SCSS entrypoint

Lazy UI 1.x used the SCSS pipeline and a JavaScript Tailwind config.

Typical 1.x entrypoint:

```scss
@import "../../vendor/step2dev/lazy-ui/resources/scss/lazy";
```

Lazy UI 2.x uses one CSS entrypoint:

```css
@import "../../vendor/step2dev/lazy-ui/resources/css/lazy.css";

@source "../views/**/*.blade.php";
@source "../js/**/*.js";
@source "../../app/**/*.php";
```

The package entrypoint already loads Tailwind CSS 4, daisyUI 5, the Tailwind forms plugin, Quill Snow CSS, Lazy UI styles, and the package Blade sources.

Old Lazy UI-specific files are no longer used:

```text
resources/scss/lazy.scss
tailwind.lazy.config.js
```

If the application has its own custom Tailwind configuration, migrate those customizations to Tailwind 4 CSS-first configuration. JavaScript config files can still be loaded explicitly with `@config`, but Tailwind 4 no longer detects them automatically.

## 4. Update PostCSS

Tailwind CSS 4 moved the PostCSS plugin to `@tailwindcss/postcss`.

Use:

```js
export default {
    plugins: {
        "@tailwindcss/postcss": {},
    },
};
```

The old configuration:

```js
export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};
```

should not be used for the Lazy UI 2.x Tailwind pipeline.

## 5. Update Vite inputs

If Vite currently builds the Lazy UI 1.x SCSS file, replace it with the new CSS entrypoint.

Before:

```js
input: [
    'resources/scss/lazy.scss',
    'resources/js/lazy.js',
],
```

After:

```js
input: [
    'resources/css/lazy.css',
    'resources/js/lazy.js',
],
```

If Lazy UI is imported from the application's main CSS file instead, keep a single application CSS entrypoint and import the Lazy UI 2.x CSS from there.

## 6. Review daisyUI 5 class changes

Lazy UI 2.x updates its internal components for daisyUI 5, but application templates may contain daisyUI classes directly.

Common changes relevant to Lazy UI projects:

| daisyUI 4 | daisyUI 5 |
| --- | --- |
| `input input-bordered` | `input` |
| `select select-bordered` | `select` |
| `textarea textarea-bordered` | `textarea` |
| borderless input/select/textarea without a modifier | use `*-ghost` |
| `tabs tabs-boxed` | `tabs tabs-box` |
| `tabs tabs-lifted` | `tabs tabs-lift` |
| `tabs tabs-bordered` | `tabs tabs-border` |
| menu item `active` | `menu-active` |
| menu item `disabled` | `menu-disabled` |
| menu item `focus` | `menu-focus` |
| avatar `online` | `avatar-online` |
| avatar `offline` | `avatar-offline` |
| avatar `placeholder` | `avatar-placeholder` |
| mockup phone `camera` | `mockup-phone-camera` |
| mockup phone `display` | `mockup-phone-display` |
| `artboard phone-1` | explicit Tailwind width/height utilities |
| `label-text`, `label-text-alt` | remove and use normal label/fieldset markup |
| `btn-group`, `input-group` | use `join` + `join-item` |

Also review custom Stack markup: daisyUI 5 expects the stack dimensions on the `stack` container instead of repeating width and height on each child.

For the complete daisyUI migration list, see the official upgrade guide:

https://daisyui.com/docs/upgrade/

## 7. Review Tailwind CSS 4 changes in application code

Tailwind CSS 4 replaces the old directives:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

with:

```css
@import "tailwindcss";
```

Also check application-specific utilities that changed between Tailwind 3 and 4, especially deprecated opacity utilities, renamed shadow/radius/blur utilities, default border/ring behavior, and order-sensitive stacked variants.

Official Tailwind upgrade guide:

https://tailwindcss.com/docs/upgrade-guide

## 8. Quill 1 to Quill 2

Lazy UI 2.x requires:

```text
quill ^2.0.3
```

The built-in Lazy UI Quill wrapper continues to use the standard Quill constructor, Snow theme CSS, toolbar modules, and `text-change` event.

If the application registers custom Quill modules, plugins, formats, or imports Quill internals directly, test those integrations separately against Quill 2.

## 9. Clear caches and rebuild

After migration:

```bash
php artisan optimize:clear
npm install
npm run build
composer test
```

Then manually verify at least:

- inputs, selects and textareas
- labels and validation states
- checkboxes, radios and toggles
- tabs
- menus and active states
- avatars
- phone mockups
- joins/button groups
- Quill editor
- light/dark theme switching
- any application templates that use daisyUI classes directly

## Rollback

Lazy UI 1.x remains independent from 2.x. If the application cannot move to Tailwind CSS 4 or daisyUI 5 yet, restore the 1.x Composer constraint and the previous frontend files instead of mixing the two frontend stacks.
