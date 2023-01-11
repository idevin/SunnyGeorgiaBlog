const headerSwitch = document.querySelector('.header-switch')
const toggleTheme = document.querySelectorAll('.themeBtn')
const el = document.documentElement

headerSwitch.addEventListener('click', () => {
  if (el.hasAttribute('date-theme')) {
    el.removeAttribute('date-theme')
    localStorage.removeItem('theme')
  } else {
    el.setAttribute('date-theme', 'dark')
    localStorage.setItem('theme', 'dark')
  }
  if (localStorage.getItem('theme') !== null) {
    el.setAttribute('date-theme', 'dark')
  }
})
toggleTheme.forEach(btn => {
  btn.addEventListener('click', () => {
    if (el.hasAttribute('date-theme')) {
      el.removeAttribute('date-theme')
      localStorage.removeItem('theme')
    } else {
      el.setAttribute('date-theme', 'dark')
      localStorage.setItem('theme', 'dark')
    }
  })
})

if (localStorage.getItem('theme') !== null) {
  el.setAttribute('date-theme', 'dark')
}
