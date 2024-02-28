const body = document.querySelector('body')
const bollOrange = document.querySelector('.orange')
const bollBlue = document.querySelector('.blue')

const randomCoor = () => {
    return {

        }
}
const mover = () => {
    let XB = Math.floor(Math.random() * (body.offsetWidth - 0 + 1))
    let YB = Math.floor(Math.random() * (body.offsetHeight- 0 + 1))

    let XO = Math.floor(Math.random() * (body.offsetWidth - 0 + 1))
    let YO = Math.floor(Math.random() * (body.offsetHeight - 0 + 1))


    bollBlue.style.transform = `translate(${XB}px, ${YB}px)`
    bollOrange.style.transform = `translate(${XO}px, ${YO}px)`
}

mover()

setInterval(mover, 4000)


