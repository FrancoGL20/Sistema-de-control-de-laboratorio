//grab everything we need
const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

//add event listeners
btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

// function myFunction() {
//     document.getElementById("dropBtn").classList.toggle("hidden");
// }

window.addEventListener('DOMContentLoaded', () => {
    const dropBtn = document.querySelector('#dropBtn');
    const dropdown = document.querySelector('#dropdown');
    const dropBtnM = document.querySelector('#dropBtnM');
    const dropdownM = document.querySelector('#dropdownM');
    if (dropdown && dropBtn && dropBtnM && dropdownM) {
        dropBtn.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('flex');
        })
        dropBtnM.addEventListener('click', () => {
            dropdownM.classList.toggle('hidden');
            dropdownM.classList.toggle('flex');
        })
    }
    //Dropdown2
    const dropBtn2 = document.querySelector('#dropBtn2');
    const dropdown2 = document.querySelector('#dropdown2');
    const dropBtnM2 = document.querySelector('#dropBtnM2');
    const dropdownM2 = document.querySelector('#dropdownM2');
    if (dropdown2 && dropBtn2 && dropBtnM2 && dropdownM2) {
        dropBtn2.addEventListener('click', () => {
            dropdown2.classList.toggle('hidden');
            dropdown2.classList.toggle('flex');
        })
        dropBtnM2.addEventListener('click', () => {
            dropdownM2.classList.toggle('hidden');
            dropdownM2.classList.toggle('flex');
        })
    }
    //Dropdown3
    const dropBtn3 = document.querySelector('#dropBtn3');
    const dropdown3 = document.querySelector('#dropdown3');
    const dropBtnM3 = document.querySelector('#dropBtnM3');
    const dropdownM3 = document.querySelector('#dropdownM3');
    if (dropdown3 && dropBtn3 && dropBtnM3 && dropdownM3) {
        dropBtn3.addEventListener('click', () => {
            dropdown3.classList.toggle('hidden');
            dropdown3.classList.toggle('flex');
        })
        dropBtnM3.addEventListener('click', () => {
            dropdownM3.classList.toggle('hidden');
            dropdownM3.classList.toggle('flex');
        })
    }
    //Dropdown4
    const dropBtn4 = document.querySelector('#dropBtn4');
    const dropdown4= document.querySelector('#dropdown4');
    const dropBtnM4 = document.querySelector('#dropBtnM4');
    const dropdownM4 = document.querySelector('#dropdownM4');
    if (dropdown4 && dropBtn4 && dropBtnM4 && dropdownM4) {
        dropBtn4.addEventListener('click', () => {
            dropdown4.classList.toggle('hidden');
            dropdown4.classList.toggle('flex');
        })
        dropBtnM4.addEventListener('click', () => {
            dropdownM4.classList.toggle('hidden');
            dropdownM4.classList.toggle('flex');
        })
    }
    //Dropdown5
    const dropBtn5 = document.querySelector('#dropBtn5');
    const dropdown5 = document.querySelector('#dropdown5');
    const dropBtnM5 = document.querySelector('#dropBtnM5');
    const dropdownM5 = document.querySelector('#dropdownM5');
    if (dropdown5 && dropBtn5 && dropBtnM5 && dropdownM5) {
        dropBtn5.addEventListener('click', () => {
            dropdown5.classList.toggle('hidden');
            dropdown5.classList.toggle('flex');
        })
        dropBtnM5.addEventListener('click', () => {
            dropdownM5.classList.toggle('hidden');
            dropdownM5.classList.toggle('flex');
        })
    }
    //Dropdown6
    const dropBtn6 = document.querySelector('#dropBtn6');
    const dropdown6 = document.querySelector('#dropdown6');
    const dropBtnM6 = document.querySelector('#dropBtnM6');
    const dropdownM6 = document.querySelector('#dropdownM6');
    if (dropdown6 && dropBtn6 && dropBtnM6 && dropdownM6) {
        dropBtn6.addEventListener('click', () => {
            dropdown6.classList.toggle('hidden');
            dropdown6.classList.toggle('flex');
        })
        dropBtnM6.addEventListener('click', () => {
            dropdownM6.classList.toggle('hidden');
            dropdownM6.classList.toggle('flex');
        })
    }
})

window.onclick = function(e) {
    if (!e.target.matches('.dropBtn')) {
        var myDropdown = document.getElementById("dropdown");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM')) {
        var myDropdown = document.getElementById("dropdownM");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    //Dropdown 2
    if (!e.target.matches('.dropBtn2')) {
        var myDropdown = document.getElementById("dropdown2");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM2')) {
        var myDropdown = document.getElementById("dropdownM2");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    //Dropdown 3
    if (!e.target.matches('.dropBtn3')) {
        var myDropdown = document.getElementById("dropdown3");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM3')) {
        var myDropdown = document.getElementById("dropdownM3");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    //Dropdown 4
    if (!e.target.matches('.dropBtn4')) {
        var myDropdown = document.getElementById("dropdown4");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM4')) {
        var myDropdown = document.getElementById("dropdownM4");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    //Dropdown 5
    if (!e.target.matches('.dropBtn5')) {
        var myDropdown = document.getElementById("dropdown5");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM5')) {
        var myDropdown = document.getElementById("dropdownM5");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    //Dropdown 6
    if (!e.target.matches('.dropBtn6')) {
        var myDropdown = document.getElementById("dropdown6");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    if (!e.target.matches('.dropBtnM6')) {
        var myDropdown = document.getElementById("dropdownM6");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
}