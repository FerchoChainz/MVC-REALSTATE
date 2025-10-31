// const { captureOwnerStack } = require("react");

document.addEventListener('DOMContentLoaded', function (){
    eventListener();
    darkmode();
});

function darkmode(){
    const darkModeBtn = document.querySelector('.dark-mode-btn')

    const darkPreference = window.matchMedia('(prefers-color-scheme: dark)');
    
    // console.log(darkPreference.matches);

    if(darkPreference.matches){
        document.body.classList.add('dark-mode')
    } else{
        document.body.classList.remove('dark-mode')
    }


    darkModeBtn.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
    })
}


function eventListener(){
    const mobileMenu = document.querySelector('.mobile-menu');


    mobileMenu.addEventListener('click',responsiveNav);

    // Show conditional fields
    const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');

    contactMethod.forEach(input => input.addEventListener('click',showContactMethods));


    console.log(contactMethod);
}

function responsiveNav(){
    const nav = document.querySelector('.navegation');

    if(nav.classList.contains('show')){
        nav.classList.remove('show')
    } else {
        nav.classList.add('show')
    }

    console.log(nav.classList);
}

function showContactMethods(e){
    const contactDiv = document.querySelector('#contact');

    contactDiv.textContent = 'Diste click'

    if(e.target.value === 'phone'){
        contactDiv.innerHTML = 
        `<label for="phone">Telefono</label>
        <input type="tel" placeholder="Tu numero" id="phone" name="contact[phone]" >
        
        <p>Elija la fecha y la hora para ser contactado</p>
            <label for="date">Fecha</label>
            <input type="date" id="date" name="contact[date]" >

            <label for="hour">Hora</label>
            <input type="time" id="hour" min="09:00" max="18:00" name="contact[hour]" >
        `;
    } else {
        contactDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu correo" id="email" name="contact[email]" >
        `;
    }


}