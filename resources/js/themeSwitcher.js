const themeSwitcher = document.querySelector('.theme-switcher')
document.addEventListener('DOMContentLoaded', (event) => {
  getTheme()
})

if (document.body.contains(themeSwitcher)) {
  themeSwitcher.addEventListener('click', (e) => {
    setTheme(e)
    getTheme()
  })
}

function setActive(selectedButton) {
  const themeSwitcherButtons = document.querySelectorAll('.theme-switcher-button')
  themeSwitcherButtons.forEach((button) => {
    if (button.classList.contains('is-active')) {
      button.classList.remove('is-active')
    }
  })
  let activeButton = document.querySelector(`.theme-switcher-${selectedButton}`)
  activeButton.classList.add('is-active')
}

function getTheme() {
  const localTheme = localStorage.theme
  let selectedButton

  if (localTheme === 'dark') {
    document.documentElement.classList.add('dark')
    selectedButton = 'dark'
  } else if (localTheme === 'light') {
    document.documentElement.classList.remove('dark')
    selectedButton = 'light'
  } else {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
    selectedButton = 'auto'
  }

  setActive(selectedButton)
}

function setTheme(e) {
  let elem = e.target

  if (elem.classList.contains('theme-switcher-dark')) {
    localStorage.theme = 'dark'
  } else if (elem.classList.contains('theme-switcher-light')) {
    localStorage.theme = 'light'
  } else {
    localStorage.removeItem('theme')
  }
}

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
  getTheme()
})
