/* 4913260 */ // sustituiir con los 7 dígitos de la cédula

#include "../include/aplicaciones.h"
#include "../include/cadena.h"
#include "../include/iterador.h"

//static TCadena iterAcadena (TIterador iter);

TCadena insertarAlFinal(nat natural, double real, TCadena cad) {
  if(cad == NULL){
    cad = crearCadena();
    cad = insertarAlInicio(natural,real,cad);
  }else{
    cad = insertarAlInicio(natural,real,cad);
    cad = cadenaSiguiente( cad);
  }
return cad;
}

TCadena removerPrimero(TCadena cad) {
 cad =  removerDeCadena(natInfo(primeroEnCadena(cad)),cad);
  return cad;
}


TCadena copiaCadena(TCadena cad) {
if(cad != NULL){
  TCadena nueva = crearCadena();
  TCadena aux = cad;
  nueva = insertarAlInicio(natInfo(primeroEnCadena(cad)),realInfo(primeroEnCadena(cad)),nueva);
  aux = cadenaSiguiente(aux);
  while (aux  != cad){
    nueva = insertarAlFinal(natInfo(primeroEnCadena(aux)),realInfo(primeroEnCadena(aux)),nueva);
    aux = cadenaSiguiente(aux);
  }
  return nueva;
  }else{
    return NULL;
  }
}
/*
TCadena iterAcadena (TIterador iter){
  reiniciarIterador(iter);
  TCadena aux = crearCadena();
  while (estaDefinidaActual(iter)){
    aux = insertarAlInicio(actualEnIterador(iter),0, aux);
    avanzarIterador(iter);
  }
  return aux;
}*/

TIterador reversoDeIterador(TIterador iter) {
  if (!estaDefinidaActual(iter)){
    reiniciarIterador(iter);
    nat aux = actualEnIterador(iter);
  
    nat aux3 = natInfo(copiaInfo(aux));
    printf("\ns%d\n",aux3);
    
    //TIterador i = crearIterador();
      
  }else{
    avanzarIterador(iter);
    reversoDeIterador(iter);
  }

  return crearIterador();
}
/*
TIterador reversoDeIterador(TIterador iter) {
  reiniciarIterador(iter);


  TCadena aux = iterAcadena(iter);
  TIterador i = crearIterador();
  
  TCadena uno = copiaCadena(aux);
  aux = uno;
  TCadena it = uno;
  
  nat s = natInfo(primeroEnCadena(uno));
  printf("%d",s);

  agregarAIterador(0,i);
  it = cadenaSiguiente(it);
  nat contador = 1;
  while (it != aux){
    agregarAIterador(contador,i);
    contador++;
    it = cadenaSiguiente(it);
  }
  liberarCadena(aux);

  return i;*/
