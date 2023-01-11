const headerBurger = document.querySelector('.header-burger')
const menu = document.querySelector('.menu')
const menuClose = document.querySelector('.menu-close')
// const headerLang = document.querySelector('.header-lang')
const headerSearch = document.querySelector('.header-search')
const search = document.querySelector('.search')
const searchClose = document.querySelector('.search__close')
const body = document.querySelector('body')
// const searchInp = document.querySelector('.search__inp')
const resultTitle = document.querySelector('.search-result__text')
const searchResults = document.querySelectorAll('.search-item__title')

document.querySelector('.search__inp').oninput = function () {
  const val = this.value.trim()
  if (val !== '') {
    resultTitle.classList.add('d-none')
    searchResults.forEach(elem => {
      if (elem.innerText.search(val) === -1) {
        elem.innerHTML = elem.innerText
        elem.parentElement.classList.remove('hide')
      } else {
        elem.parentElement.classList.add('hide')
        const str = elem.innerText
        elem.innerHTML = insertMark(str, elem.innerText.search(val), val.length)
      }
    })
  } else {
    resultTitle.classList.remove('d-none')
    searchResults.forEach(elem => {
      elem.parentElement.classList.remove('hide')
      elem.innerHTML = elem.innerText
    })
  }
}

function insertMark (string, pos, len) {
  return string.slice(0, pos) + '<span class=\'mark\'>' + string.slice(pos, pos + len) + '</span>' + string.slice(pos + len)
};

headerBurger.addEventListener('click', () => {
  menu.classList.add('showMenu')
})

menuClose.addEventListener('click', () => {
  menu.classList.remove('showMenu')
})

// headerLang.addEventListener('click', () => {
//   headerLang.classList.toggle('trRu')
// })

headerSearch.addEventListener('click', () => {
  search.classList.add('showSearch')
  body.classList.add('overflow-hidden')
})

searchClose.addEventListener('click', () => {
  search.classList.remove('showSearch')
  body.classList.remove('overflow-hidden')
})

window.onclick = function (e) {
  if (e.target === search) {
    search.classList.remove('showSearch')
    body.classList.remove('overflow-hidden')
  }
}

$('.menu-title').click(function () {
  $(this).siblings().removeClass('showMenuList')
  $(this).toggleClass('showMenuList')
})
