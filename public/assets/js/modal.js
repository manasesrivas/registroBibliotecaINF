const button = document.querySelector('.button_modal')
const button_x = document.querySelector('.x-modal')
const modalContainer = document.querySelector('.modal-container')
const modal = document.querySelector('.modal')

button.addEventListener('click', () => {
    modalContainer.classList.toggle('mostrar-modal-container')
    modal.classList.toggle('mostrar-modal')

})

button_x.addEventListener('click', () => {
    modalContainer.classList.toggle('mostrar-modal-container')
    modal.classList.toggle('mostrar-modal')
})

const checkDocente = document.querySelector('.check-docentes')
const checkEstudiante = document.querySelector('.check-estudiantes')
const checkTodos = document.querySelector('.check-todos')
const selectsForStudents = document.querySelectorAll('.selects-for-students')
const checkTodosEstudiantes = document.querySelector('.todos-los-estudiantes')

const disableStuden = (state) => {
    selectsForStudents.forEach(select => {
            select.disabled = state
            checkTodosEstudiantes.disabled = state      
    })
}


checkDocente.addEventListener('change', () => {
    let state = checkDocente.checked
    checkEstudiante.checked = (state) ? false : true
    checkTodos.checked = false
    disableStuden(state)
})
checkEstudiante.addEventListener('change', () => {
    let state = checkEstudiante.checked
    checkDocente.checked = (state) ? false : true
    checkTodos.checked = false
    disableStuden(!state)
})

checkTodos.addEventListener('change', () => {
    checkEstudiante.checked = false
    checkDocente.checked = false
    disableStuden(true)
})

checkTodosEstudiantes.addEventListener('change', () => {
    selectsForStudents.forEach(select => {
        select.disabled = checkTodosEstudiantes.checked    
    })

})