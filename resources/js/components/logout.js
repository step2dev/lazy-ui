let logout = document.querySelector('.logout')
if (logout) {
    logout.addEventListener('click', (event) => {
        event.preventDefault()
        document.getElementById('logout-form').submit()
    })
}
