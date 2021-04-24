/**
 * @file static/js/slider.js
 * @brief JS pour le slider de type Netflix permettant l'affichage des films
 */

$('.main-carousel').flickity({
  // options
  groupCells: '80%',
  cellAlign: 'left',
  contain: true
});



// const container = document.querySelector('.film-slider-container');
// const allbox = container.children; // on recupere tous les morceaux du slider

// const container_width = container.offsetWidth; // on récupère la taille de l'écran
// const margin = 30;

// /**
//  * variables sur les elements du slider
//  */
// var items = 0;
// var total_items = 0;


// /**
//  * Caractéristiques "responsives" du slider selon la taille de l'écran
//  */
// responsive = [
// 	{breakpoint: {width:0, item:1}},
// 	{breakpoint: {width:600, item:3}},
// 	{breakpoint: {width:1000, item:5}}
// ]

// /**
//  * Au lancement de la page
//  */
// $(document).ready(function() {
// 	load_film_slider();
// });


// /**
//  * Charge la taille des images du carousel
//  */
// function load_film_slider(){
// 	for (let i=0; i<responsive.length; i++) {
// 		if (window.innerWidth > responsive[i].breakpoint.width) {
// 			items = responsive[i].breakpoint.item;
// 		}
// 	}
// 	start_film_slider();
// 	//console.log(items);
// }

// function start_film_slider() {
// 	var total_items_for_width = 0;
// 	// on gere les marges pour chaque image
// 	for (let i=0; i<allbox.length; i++) {
// 		allbox[i].style.width = (container_width/items) - margin + "px";
// 		allbox[i].style.margin = (margin/2) + "px";
// 		total_items_for_width += container_width/items;
// 		total_items++;
// 	}

// 	// width du container - permet de cacher les "elements en trop" pour un effet slider
// 	container.style.width = total_items_for_width + "px";

// 	// slides controls number set up
//  	 const allSlides=Math.ceil(totalItems/items);
//      const ul=document.createElement("ul");
//         for(let i=1;i<=allSlides;i++){
//           const li=document.createElement("li");
//                li.id=i;
//                li.innerHTML=i;
//                li.setAttribute("onclick","controlSlides(this)");
//                ul.appendChild(li);
//                if(i==1){
//                	li.className="active";
//                }
//         }
//         controls.appendChild(ul);
// }

