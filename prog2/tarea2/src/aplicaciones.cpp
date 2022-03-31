/* 4913260 */ // sustituiir con los 7 dígitos de la cédula

#include "../include/aplicaciones.h"
#include "../include/cadena.h"
#include "../include/iterador.h"
#include <assert.h>

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

TIterador reversoDeIterador(TIterador iter) {
 
  reiniciarIterador(iter);
  TIterador res = crearIterador();
  nat contador = 0;
  
  while (estaDefinidaActual(iter)){
    contador++;
    agregarAIterador(actualEnIterador(iter),res);
    avanzarIterador(iter);
  }

  return res;
}

/* ESTE CODIGO FUNCIONA
TIterador reversoDeIterador(TIterador iter) {
  TIterador res = crearIterador();
  if (!estaDefinidaActual(iter)){
    reiniciarIterador(iter);
  }
  if (estaDefinidaActual(iter)){
    reversoRecursivo(iter,res);
  }
  return res;
}


void reversoRecursivo(TIterador entrada, TIterador salida){
    if (estaDefinidaActual(entrada)){
     agregarAIterador(actualEnIterador(entrada),salida);
     avanzarIterador(entrada); 
     reversoRecursivo(entrada,salida);
    }

}*/