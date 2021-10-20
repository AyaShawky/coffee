// Load More Function ...
    
const loadmore = document.querySelector('#BtnMore');
const loadmoresection = document.querySelector('#BtnMoreSection');
let currentItems = 6;
loadmore.addEventListener('click', (e) => {
    const elementList = [...document.querySelectorAll('.TeachersSection .BoxTeacher .box')];
    for (let i = currentItems; i < currentItems + 3; i++) {
        if (elementList[i]) {
            elementList[i].style.display = 'block';
        }
    }
    currentItems += 3;

    // Load more button will be hidden after list fully loaded
    if (currentItems >= elementList.length) {
        loadmoresection.style.display = 'none';
    }
})