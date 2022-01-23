let container = document.getElementById('container');
container.style.minHeight = innerHeight + 'px';

// inscription & connexion
// get fields, labels and button

let field = document.getElementsByTagName('input');

let btn = document.getElementById('validate');
let label = document.getElementsByTagName('label');

// get the place where display error text
let errorText = document.getElementById('errorText');

// create element witch contain the text
let info = document.createElement('p');
info.style.textAlign = "center";

// on click verify each field is not empty
if(btn){
    btn.addEventListener('click', function (event){
        info.innerHTML = "Veuillez remplir le(s) champs :";
        for(let i = 0 ; i < field.length ; i++){

            if(field[i].value.length <= 0){
                event.preventDefault();
                info.innerHTML += "<br>" + label[i].innerText;
            }
            else{
                info.innerHTML = " ";
            }
        }
        errorText.appendChild(info);
    })
}

// admin mod

// on click show action choice
let entity = document.getElementsByClassName('entity');
let operation = document.getElementById('operation');
let others = document.getElementById('others');
let actions = document.getElementsByClassName('action');

// first menu on click show operations
for (let i = 0 ; i < entity.length ; i++){
    entity[i].addEventListener('click', function (){
        entity[i].style.backgroundColor = 'white';
        operation.style.display = 'flex';
    })
}

for (let i = 0 ; i < actions.length ; i++){
    actions[i].addEventListener('click', function (){
        actions[i].style.backgroundColor = 'white';
    })
}

