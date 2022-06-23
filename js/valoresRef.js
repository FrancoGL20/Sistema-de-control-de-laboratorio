const box = document.getElementById('box');
console.log(box);

function handleRadioClick() {
  if (document.getElementById('show').checked) {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
}

//Para radio de alta clientes
const radioButtons = document.querySelectorAll('input[name="valoresRef"]');
radioButtons.forEach(radio => {
  radio.addEventListener('click', handleRadioClick);
});

const radioAltaEquipo = document.querySelectorAll('input[name="garantia"]');
radioAltaEquipo.forEach(radio => {
  radio.addEventListener('click', handleRadioClick);
});

window.onload = handleRadioClick();