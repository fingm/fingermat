/* 4913260 */ 

#include "../include/cadena.h"
#include "../include/iterador.h"
#include <assert.h>

struct nodoCadena{
  TInfo dato;
  nodoCadena * sig;
};

typedef nodoCadena *header;

struct _rep_cadena {
  header  ini;
  header  fin;
};

TCadena crearCadena() {
  return NULL;
}

void liberarCadena(TCadena cad) {
  if (cad!= NULL){
    header aux = cad->ini;
    if (aux->sig == NULL){
      liberarInfo(aux->dato);
      cad->ini = NULL;
      cad->fin = NULL;
      delete aux;
    }else{
      while (aux->sig != NULL){

        header borrar = aux;
        aux = aux->sig;
        cad->ini = aux;
        liberarInfo(borrar->dato);
        delete borrar;
      }
      liberarInfo(aux->dato);
      delete aux;
    }      cad->ini = NULL;
      cad->fin = NULL;
  }
}

nat cantidadEnCadena(TCadena cad) {
  if (cad == NULL){
    return 0;
  }else{
    nat contador = 1;
    header nuevo = cad->ini;
    while(nuevo->sig != NULL){
      contador++;
      nuevo = nuevo->sig;
    }
    nuevo = NULL;
    return contador;
  }
}

bool estaEnCadena(nat natural, TCadena cad) {
  bool res = false;
  if (cad != NULL){
    header aux = cad->ini;
    if (natInfo(aux->dato) == natural){
      res = true;
    }else {
      while (aux->sig != NULL && !res){
        aux = aux->sig;
        if (natInfo(aux->dato) == natural){
          res = true;
        }
      }
    }
    aux = NULL;
    delete aux;
  }
  return res;
}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {

    header nuevo = new nodoCadena;
    nuevo->dato = crearInfo(natural,real);
    nuevo->sig = NULL;

    if (cad == NULL){
      cad = new _rep_cadena;
      cad->fin = nuevo;
      cad->ini = nuevo;
    }
    return cad;
}

TInfo infoCadena(nat natural, TCadena cad) {
  return NULL;
}

TInfo primeroEnCadena(TCadena cad) {
  return NULL;
}

TCadena cadenaSiguiente(TCadena cad) {
  return NULL;
}

TCadena removerDeCadena(nat natural, TCadena cad) {
  return NULL;
}

void imprimirCadena(TCadena cad) {
  if (cad != NULL){
    header aux = cad->ini;
    while(aux != NULL){
      printf("(%d,%.2f)",natInfo(aux->dato),realInfo(aux->dato));
      aux = aux->sig;
    }
      printf("\n");
      aux = NULL;
      delete aux;
  }else{
  printf("\n");
  }
}