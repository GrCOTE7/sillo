import {react, useState} from "react"

console.log('oki')

// Boucle de 1 à 100
console.log("oki");

// Boucle de 1 à 100
console.log(''); // pour avoir un retour à la ligne
console.log("oki");

// Boucle de 1 à 100
let output = "";
for (let i = 1; i <= 100; i++) {
  output += `${i} `;
}
console.log(output);


// Observe le .petName input, et si ça finit par alot, donne lui la classe .good, sinon, la classe .bad

const petName = document.querySelector('.petName');

petName.addEventListener('input', function() {
  if (this.value.endsWith('alot')) {
    this.classList.add('good');
    this.classList.remove('bad');
  } else {
    this.classList.add('bad');
    this.classList.remove('good');
  }
});

function Component() {
  const [species, setSpecies] = useState('cat');
}
