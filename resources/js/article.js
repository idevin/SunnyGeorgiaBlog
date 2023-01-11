// const commentToggle = document.querySelector('.comment-toggle')
const modalContent = document.querySelector('.modal-article')
const tableOfContents = document.querySelector('.tableOfContents')
const body1 = document.querySelector('body')
const modalContentClose = document.querySelector('.modal-article__close')
const modalLink = document.querySelectorAll('.modal-article-item__link')
const articleContainer = document.getElementById('article-container')
const contentList = document.getElementById('content-list')

// commentToggle.addEventListener('click', () => {
//   commentToggle.parentElement.parentElement.classList.toggle('showComments')
// })
const contentHeaders = articleContainer.querySelectorAll('h2')
contentHeaders.forEach((header) => {
  const text = header.textContent
  header.id = text
  const anchor = document.createElement('li')
  anchor.innerHTML = `<a class="modal-article-item__link" href="#${text}">${text}</a>`
  contentList.appendChild(anchor)
  anchor.addEventListener('click', () => {
    modalContent.classList.remove('showModal')
    body1.classList.remove('overflow-hidden')
  })
})
tableOfContents.addEventListener('click', () => {
  modalContent.classList.add('showModal')
  body1.classList.add('overflow-hidden')
})

modalContentClose.addEventListener('click', () => {
  modalContent.classList.remove('showModal')
  body1.classList.remove('overflow-hidden')
})

modalLink.forEach(link => {
  link.addEventListener('click', () => {
    modalContent.classList.remove('showModal')
    body1.classList.remove('overflow-hidden')
  })
})

window.onclick = function (e) {
  if (e.target === modalContent) {
    modalContent.classList.remove('showModal')
    body1.classList.remove('overflow-hidden')
  }
}

if ($(window).width() > 767) {
  $(window).on('scroll', function () {
    if ($(window).scrollTop()) {
      $('.tableOfContents').addClass('toScroll')
    } else {
      $('.tableOfContents').removeClass('toScroll')
    }
  })
}
