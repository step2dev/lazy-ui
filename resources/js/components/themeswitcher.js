const storageKey = 'theme';

function toggleThemes(element) {
    return (element.dataset.toggleTheme || 'light,dark')
        .split(',')
        .map((theme) => theme.trim())
        .filter(Boolean);
}

function currentTheme() {
    return document.documentElement.dataset.theme || localStorage.getItem(storageKey) || '';
}

function syncToggles(theme) {
    document.querySelectorAll('[data-toggle-theme]').forEach((element) => {
        const themes = toggleThemes(element);
        element.classList.toggle('swap-active', themes.length > 1 && theme === themes[1]);
    });
}

function syncActiveTheme(theme) {
    document.querySelectorAll('[data-set-theme]').forEach((element) => {
        const activeClass = element.dataset.actClass;

        if (!activeClass) {
            return;
        }

        element.classList.toggle(activeClass, element.dataset.setTheme === theme);
    });
}

function applyTheme(theme, persist = true) {
    if (!theme) {
        return;
    }

    document.documentElement.dataset.theme = theme;

    if (persist) {
        localStorage.setItem(storageKey, theme);
    }

    syncToggles(theme);
    syncActiveTheme(theme);

    window.dispatchEvent(new CustomEvent('lazy-ui:theme-changed', {
        detail: {theme},
    }));
}

function initialTheme() {
    const stored = localStorage.getItem(storageKey);

    if (stored) {
        return stored;
    }

    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        return 'dark';
    }

    return currentTheme();
}

document.addEventListener('click', (event) => {
    const themeItem = event.target.closest('[data-set-theme]');

    if (themeItem) {
        applyTheme(themeItem.dataset.setTheme);

        return;
    }

    const toggle = event.target.closest('[data-toggle-theme]');

    if (!toggle) {
        return;
    }

    const themes = toggleThemes(toggle);

    if (!themes.length) {
        return;
    }

    const index = themes.indexOf(currentTheme());
    const nextTheme = themes[(index + 1 + themes.length) % themes.length];

    applyTheme(nextTheme);
});

function bootThemeSwitcher() {
    const theme = initialTheme();

    if (theme) {
        applyTheme(theme, false);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootThemeSwitcher, {once: true});
} else {
    bootThemeSwitcher();
}
