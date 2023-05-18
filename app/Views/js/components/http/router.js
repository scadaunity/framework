console.log('router');

const routerLink = document.querySelector('a');

routerLink.addEventListener('click', function(event){
    event.preventDefault();
    console.log(event);
    
});