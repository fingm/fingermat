//const parag = document.querySelector('body > div:nth-child(2) > p:nth-child(2)');
//console.log(parag);
// querySelectorAll (selecciona todos los que cumplen tal cosa)
//Esto nos dara un nodeList, que es un grupo de nodos (es como un array)
// Esto nos permite seleccionar elementos de la nodeLista, como si fuese un array

/*const algo = document.querySelectorAll('p');
console.log(algo);
console.log(algo[2]);

algo.forEach(algo =>{
    console.log(algo);
})

//fin del tema*/

//Lo siguiente se hace para captar un parrafo y modificarlo con
// innerHTML.
/*
const parag = document.querySelector('p');
console.log(parag.innerHTML);

parag.innerHTML = 'I just changed!';
//si a lo anterior le agregamos parag.innerHTML += 'I just changed!';*/

//Ahora cambiemos el contenido de varios elementos a la vez

const parag = document.querySelectorAll('p');
/*parag.forEach(parag=>{
    console.log(parag.innerHTML)
});*/

parag.forEach(parag =>{
    console.log(parag.innerHTML);
    parag.innerHTML ='Beetlejuice';
});





