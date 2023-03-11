const menuItem = document.querySelectorAll('.menu-item .sub-menu .menu-item'),
  menuItemActive = document.querySelectorAll('.header-nav .menu-item-has-children'),
  menuBtn = document.createElement('div'),
  dropdownMenu = document.querySelector('.dropdown-menu');

menuBtn.classList.add('menu__item-btn');
if (menuItem) {
  menuItem.forEach((item) => {
    const menuItemLink = item.querySelectorAll('a');
    menuItemLink.forEach((itemLink) => {
      const menuItemImage = itemLink.querySelectorAll('img');
      menuItemImage.forEach((itemImage) => {
        item.append(itemImage);
      })

    })
  });
}
if (document.documentElement.clientWidth < 992) {
  dropdownMenu.append(menuBtn);
  menuBtn.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
  });
}



// скрипт для добавления ссылок к заголовкам
window.addEventListener('DOMContentLoaded', () => {
  const blogContent = document.querySelector('.blog__content'),
    blockContent = blogContent.querySelector('.single__content'),
    titleContent = blockContent.querySelectorAll('h2'),
    blogContentRow = blogContent.querySelector('.row'),
    contentBox = blogContentRow.querySelector('.col-md-8');
  function createNavigationElement(tagName, className) {
    const element = document.createElement(tagName);
    element.classList.add(className);
    return element;
  }
  if (titleContent.length > 0) {
    const contentNav = createNavigationElement('div', 'content__navigation');
    const colMd4 = createNavigationElement('div', 'col-md-4');
    blogContentRow.prepend(colMd4);
    colMd4.prepend(contentNav);
    const contentNavBtn = createNavigationElement('span', 'content__navigation-btn');
    contentNavBtn.innerText = titleContent[0].innerText;
    contentNav.prepend(contentNavBtn);


    // Получаем ссылку на элемент навигации
    const nav = document.querySelector('.content__navigation');
    const headerHeight = document.querySelector('.site-header');
    // Получаем позицию навигации относительно документа
    var navPosition = nav.getBoundingClientRect().top + window.pageYOffset;

    // Функция для обновления положения навигации
    function updateNavPosition() {
      // Если текущая позиция скролла больше или равна позиции навигации
      if (window.pageYOffset >= navPosition - headerHeight.offsetHeight) {
        // Добавляем класс для прижатия навигации
        nav.classList.add('fixed');
        if (window.innerWidth < 992) {
          nav.style.top = `${headerHeight.offsetHeight}px`;
          blockContent.style.marginTop = `${headerHeight.offsetHeight}px`;
        }

      } else {
        // Удаляем класс для прижатия навигации
        nav.classList.remove('fixed');
        nav.style.top = 0;
        blockContent.style.marginTop = 0;

      }
    }

    // Обновляем положение навигации при загрузке страницы
    updateNavPosition();

    // Обновляем положение навигации при каждом скролле страницы
    window.addEventListener('scroll', updateNavPosition);

    // перебирает все заголовки и выполняет функцию если нажатие на новосозданную ссылку 
    titleContent.forEach((title, index) => {
      const contentNavLink = createNavigationElement('a', 'content__navigation-link');
      contentNavLink.innerText = title.innerText;
      contentNavLink.href = `#title-${index + 1}`;
      contentNav.append(contentNavLink);
      title.id = `title-${index + 1}`;
      contentNavLink.addEventListener('click', () => {
        contentNav.classList.toggle('active');
        contentNavBtn.innerText = contentNavLink.innerText;
        if (window.clientWidth < 992) {
          setTimeout(() => {
            window.scrollBy(0, -headerHeight.offsetHeight);
          }, 1);
        } else {
          setTimeout(() => {
            window.scrollBy(0, -headerHeight.offsetHeight - nav.offsetHeight);
          }, 1);
        }

      });
    })
    // нажатие на текст добавляет актив
    contentNavBtn.addEventListener('click', () => {
      contentNav.classList.toggle('active');
    })
  } else {
    contentBox.classList.add('mx-auto');
  }


  // 
  window.addEventListener('scroll', () => {
    if (window.clientWidth < 992) {
      if (blockContent.getBoundingClientRect().bottom <= 0) {
        nav.classList.remove('fixed');
      } else {
        nav.classList.add('fixed');
      }
    }

  });
});







// 