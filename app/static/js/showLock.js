const buttons = document.querySelectorAll('.buttons')
const input = document.getElementById('password')
const img = document.querySelector('.lock')

buttons.forEach(button => {
button.addEventListener('click', () =>{
    if (input.type == 'password'){
        input.type = 'text'
        img.classList.toggle('o')

    }
    else{
        input.type = 'password'
        img.classList.toggle('o')
    }

})
});