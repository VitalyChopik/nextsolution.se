const menuItem = document.querySelectorAll('.menu-item');

menuItem.forEach((item) => {
  const menuItemLink = document.querySelectorAll('.menu-item a');
  menuItemLink.forEach((itemLink) => {
    console.log(itemLink.children);
  });
  item.addEventListener('click', () => {

  })
});
