let allSelect = document.body.getElementsByTagName('select');
const nbColonnes = document.body.getElementsByTagName('th').length-1;
const nbLignes = allSelect.length / nbColonnes;

function dataRepresentation(){
  let planning = new Array();

  for(let l=0; l<nbLignes; ++l){
    planning[l] = new Array();
    for(let c=0; c<nbColonnes; ++c){
      planning[l][c] = allSelect[c];
    }
  }
}
