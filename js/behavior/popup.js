export function closePopUp(){
    const popups = document.getElementsByClassName('popup');

    for(let i = 0; i < popups.length; i++){
        popups[i].classList.remove('open');
    }
}

export function openPopUp(){{
    const popups = document.getElementsByClassName('popup');

    for(let i = 0; i < popups.length; i++){
        popups[i].classList.add('open');
    }
}}