/* 4913260 */ 

#include "../include/cadena.h"
#include "../include/iterador.h"
#include <assert.h>

struct _rep_cadena { 
  TInfo dato;
  TCadena ant;
  TCadena sig;
};

TCadena crearCadena() {
  return NULL;
}

void liberarCadena(TCadena cad) {
  if (cad != NULL){
    if (cad->sig == NULL){
      liberarInfo(cad->dato);
      cad = NULL;
    }else{
      while (cad != NULL){
        TCadena borrar = cad;
        cad = cad->sig;
        liberarInfo(borrar->dato);
        delete borrar;
      }
    }
  }  
}

nat cantidadEnCadena(TCadena cad) {
  if (cad == NULL){
    return 0;
  }else{
    nat contador = 0;
    while(cad != NULL){
      contador++;
      cad = cad->sig;
    }
    return contador;
  }
}

bool estaEnCadena(nat natural, TCadena cad) {
  bool aux = false; 
  if (cad != NULL){
    if (natInfo(cad->dato) == natural){
      aux = true;
    }else{
      while (cad != NULL && !aux){
        if (natInfo(cad->dato) == natural){
          aux = true;
        }
        cad = cad->sig;
      }
    }
  }
  return aux;
}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {
  
  TCadena nuevoNodo = new _rep_cadena;
  nuevoNodo->dato =crearInfo(natural,real);
  nuevoNodo->sig = NULL;
  nuevoNodo->ant = NULL;

  if (cad == NULL){
    cad = nuevoNodo;
  }else{
    TCadena aux = cad;
    cad = nuevoNodo;
    nuevoNodo->sig = aux;
    aux->ant = nuevoNodo;
    aux = NULL;    
  }
  return cad;
}

TInfo infoCadena(nat natural, TCadena cad) {
  while (natInfo(cad->dato) != natural){
    cad = cad->sig;
  }
  return cad->dato;
}

TInfo primeroEnCadena(TCadena cad) {
  return copiaInfo(cad->dato);
}

TCadena cadenaSiguiente(TCadena cad) {
  if (cad == NULL || cad->sig == NULL){
    return cad;
  }else if (cad->sig->sig== NULL ){
    TCadena aux  = cad;
    TCadena aux2 = cad->sig;
    cad = aux;
    cad->sig = aux2;
    return cad;
  }
  return NULL;
}

TCadena removerDeCadena(nat natural, TCadena cad) {
  assert (cad == NULL);
  if (natInfo(cad->dato) == natural){
    if (cad->sig == NULL){
      TCadena borrar = cad;
      liberarInfo(borrar->dato);
      delete borrar;
      cad = NULL;
    }else{
      TCadena borrar = cad;
      cad = cad->sig;
      liberarInfo(borrar->dato);
      delete borrar;
    }
  }else{
    TCadena iter = cad;
    while(iter != NULL && natInfo(iter->sig->dato) != natural){
      iter = iter->sig;
    }if (iter->sig->sig == NULL){
      TCadena borrar = iter->sig;
      iter->sig = NULL;
      liberarInfo(borrar->dato);
      delete borrar;
      iter = NULL;
    }else{
      TCadena borrar = iter->sig;
      iter->sig = borrar->sig;
      liberarInfo(borrar->dato);
      delete borrar;
      iter = NULL;
    }
  }
  return cad;
}

void imprimirCadena(TCadena cad) {
  if (cad != NULL){
    while (cad != NULL){
     printf("(%d,%4.2lf)",natInfo(cad->dato),realInfo(cad->dato));
     cad = cad->sig;
    }
  }
  printf("\n");
}