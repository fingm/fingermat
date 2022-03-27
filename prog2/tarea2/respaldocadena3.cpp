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
    if (cad == cad->sig){
      liberarInfo(cad->dato);
    }else{
      while(cad != cad->sig){
        TCadena borrar = cad;
        cad = cad->sig;
        liberarInfo(borrar->dato);
        delete borrar;
      }
      TCadena borrar = cad;
      liberarInfo(borrar->dato);
      delete borrar;
    }
  }

  cad = NULL;
}

nat cantidadEnCadena(TCadena cad) {
  nat contador= 0;
  if (cad != NULL){
    contador++;
    if (cad ->sig != cad){
      while (cad->sig != cad){
        cad = cad->sig;
        contador ++;
      }
    }
  }
  return contador;
}

bool estaEnCadena(nat natural, TCadena cad) {
  bool aux = false;
  if (cad != NULL){
    if (natInfo(cad->dato) == natural){
      aux = true;
    }else{
      while (cad != cad->sig  && !aux){
        if (natInfo(cad->dato) == natural){
          aux = true;
        }
        cad = cad->sig;
      }if (natInfo(cad->dato) == natural){
        aux = true;
      }
    }
  }
  return aux;
}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {
 
  TCadena nuevoNodo = new _rep_cadena;
  nuevoNodo->dato =crearInfo(natural,real);
  nuevoNodo->sig = nuevoNodo;
  nuevoNodo->ant = nuevoNodo;

  if (cad == NULL){
    cad = nuevoNodo;

  }else{
    TCadena aux = cad;
    cad = nuevoNodo;
    nuevoNodo->sig = aux;
    nuevoNodo->ant = aux->ant;
    aux->ant = nuevoNodo;

    aux = NULL;
  }
  return cad;
}

TInfo infoCadena(nat natural, TCadena cad) {
  if (cad != NULL){
    if (natInfo(cad->dato) == natural){
      return cad->dato;
    }else{
      while(natInfo(cad->dato) != natural){
        cad = cad->sig;
      }
      return cad->dato;
    }
  }else{
    return NULL;
  }
}

TInfo primeroEnCadena(TCadena cad) {
  return NULL;
}

TCadena cadenaSiguiente(TCadena cad) {
  return NULL;
}

TCadena removerDeCadena(nat natural, TCadena cad) {
  if (cad != NULL){
    if (sonIgualesInfo(cad->dato,cad->sig->dato)){
      TCadena aux = cad;
      liberarInfo(aux->dato);
      delete cad;
      cad = NULL;
    }else if (natInfo(cad->dato) == natural){
      TCadena borrar = cad;
      cad = cad->sig;
      cad->ant = borrar->ant;
      liberarInfo(borrar->dato);
      delete borrar;
    }else if(natInfo(cad->ant->dato) == natural){
    }else{
       TCadena iter = cad;
       while (natInfo(iter->sig->dato) != natural){
         iter = iter->sig;
       }TCadena borrar = iter->sig;
       iter->sig = iter->sig->sig;
       borrar->sig = borrar->ant->ant;
       liberarInfo(borrar->dato);
       delete borrar;
    }

  }
  return cad;

}

void imprimirCadena(TCadena cad) {

  if (cad != NULL){
    printf("(%d,%4.2lf)",natInfo(cad->dato),realInfo(cad->dato));
    if (cad->sig != cad){
      while (cad->sig != cad){
        cad = cad->sig;
      printf("(%d,%4.2lf)",natInfo(cad->dato),realInfo(cad->dato));
      }
    }
  }
  printf("\n");
}

