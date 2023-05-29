const mobileMenu = document.getElementById('mobile-menu-icon');
const catMobileMenu = document.getElementById('cat-mobile-menu');
const closeCatMenu = document.getElementById('close-menu');
const overlay = document.getElementById('overlay');
console.log(mobileMenu);

//  mobileMenu.addEventListener('click', ()=>{
//     console.log('vjjnvfv');
//  })

 if(catMobileMenu.className === 'category-mobile'){
    mobileMenu.addEventListener('click', ()=>{
        catMobileMenu.classList.remove('category-mobile');
        overlay.classList.add('overlay');
        catMobileMenu.style.transition = '5s'
     })
 }

 if(catMobileMenu.className === 'category-mobile'){
    closeCatMenu.addEventListener('click', ()=>{;
        catMobileMenu.classList.add('category-mobile');
        catMobileMenu.style.transition = '5s'
        overlay.classList.remove('overlay');
    })
 }



 