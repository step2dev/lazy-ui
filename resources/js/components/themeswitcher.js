import { themeChange } from 'theme-change'

themeChange()
let themeToggleBtn = document.querySelector('[data-toggle-theme]')

document.addEventListener('DOMContentLoaded', () => {
    if (themeToggleBtn) {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleBtn.classList.add('swap-active')
        } else {
            themeToggleBtn.classList.remove('swap-active')
        }
    }
})



