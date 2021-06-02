



const invi = () => {
  // console.log ('test click affiche susar');
  var requete_avancee = document.querySelector('.requete_avancee');
  var RechAv = document.querySelector('#RechAv');
  requete_avancee.classList.toggle('invisible');
  
  if(RechAv.innerHTML==="Recherche avancée") {
    RechAv.innerHTML = "Recherche simple";
  } else {
    RechAv.innerHTML = "Recherche avancée";
  }
}
const mask_div_req_av = () => {
  var requete_avancee = document.querySelector('.requete_avancee');
  var RechAv = document.querySelector('#RechAv');
  if(getComputedStyle(requete_avancee).display != "none"){
    requete_avancee.style.display = "none";
  } else {
    requete_avancee.style.display = "block";
  }
  if(RechAv.innerHTML==="Recherche avancée") {
    RechAv.innerHTML = "Recherche simple";
  } else {
    RechAv.innerHTML = "Recherche avancée";
  }
}
const rq_simple = () => {
  // console.log ('test click affiche susar');
  var requete_avancee = document.querySelector('.requete_avancee');
  var RechAv = document.querySelector('#RechAv');

  requete_avancee.classList.add('invisible');
  RechAv.innerHTML = "Recherche simple";
}
const req_simple = () => {
  // console.log ('test click affiche susar');
  var requete_avancee = document.querySelector('.requete_avancee');
  var RechAv = document.querySelector('#RechAv');

  requete_avancee.style.display = "none";
  RechAv.innerHTML = "Recherche avancée";
}
// function invi()  {
//   console.log ('test click affiche susar');
//   var requete_avancee = document.querySelector('.requete_avancee');
//   requete_avancee.classList.toggle('invisible');
// }

// console.log ('test affiche susar');

var RechAv = document.querySelector('#RechAv');

RechAv.addEventListener('click', (e) => {
  // console.log ("coucou !!!");
  // invi();
  mask_div_req_av();
})

window.addEventListener("load",  (e) => {
  // console.log ("coucou !!!");
  // rq_simple();
  req_simple();
});