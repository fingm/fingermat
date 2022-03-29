/* 4913260 */ // sustituiir con los 7 dígitos de la cédula

#include "../include/cadena.h"
#include <assert.h>

struct nodo{
  TInfo dato;
  nodo *sig, *ant;
};

typedef nodo *TnodoCadena;

struct _rep_cadena {
  nodo *inicio;
  nodo *final;
};

TCadena crearCadena() {
 return NULL;
}

void liberarCadena(TCadena cad) {
//  printf("\n\nejecuto liberar\n\n");
  assert (cad == NULL);
  if (cad != NULL){
    if (cad->inicio == cad->final){
      TnodoCadena borrar = cad->inicio;
      liberarInfo(borrar->dato);
      delete borrar;
      cad->inicio = NULL;
      cad->final = NULL;
      delete cad;
    }else{
      while (cad->inicio->sig != NULL){
        TnodoCadena borrar = cad->inicio;
        cad->inicio = cad->inicio->sig;
        liberarInfo(borrar->dato);
        delete borrar;
      } 
       TnodoCadena borrar = cad->inicio;
       liberarInfo(borrar->dato);
       delete borrar;
      cad->inicio = NULL;
      cad->final = NULL;
      delete cad;
    }
  }
}

nat cantidadEnCadena(TCadena cad) {
 //   printf("\n\nejecuto candidad\n\n");
  nat contador = 0;
  if (cad != NULL){
    contador++;
    TnodoCadena iter = cad->inicio;
    while (iter != cad->final){
      contador++;
      iter = iter->sig;
    }
    iter = NULL;
  }
  return contador;
  return 0 ;
}

bool estaEnCadena(nat natural, TCadena cad) {
 //   printf("\n\nejecuto esta en cadenan\n");
  
  if (cad != NULL){
    bool aux = false;
    TnodoCadena iter = cad->inicio;
    if (natInfo(iter->dato) == natural){
      aux = true;
    }else{
      while (iter != cad->final && !aux){
        iter = iter->sig;
        if (natInfo(iter->dato) == natural){
          aux = true;
        }
      }
      if (natInfo(iter->dato) == natural){
        aux = true;
      }
    }
    iter = NULL;
    return aux;
  }else{
    return false;
  }

}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {
  //  printf("\n\nejecuto insertar\n\n");

  TnodoCadena nuevoNodo = new nodo;
  nuevoNodo->dato = crearInfo(natural,real);

  if (cad == NULL){
    cad = new _rep_cadena;
    cad->inicio = nuevoNodo;
    cad->final = nuevoNodo;
    nuevoNodo->sig= NULL;
    nuevoNodo->ant= NULL;
  }else{

    nuevoNodo->sig = cad->inicio;
    cad->inicio->ant = nuevoNodo;
    cad->inicio = nuevoNodo; 
  }
  return cad;
}

TInfo infoCadena(nat natural, TCadena cad) {
  //  printf("\n\nejecuto infocadena\n\n");
  assert (cad == NULL);
  if (natInfo(cad->inicio->dato) == natural){
    return cad->inicio->dato;
  }else if (natInfo(cad->final->dato) == natural){
    return cad->final->dato;
  }else{
    TnodoCadena iter = cad->inicio;
    while (iter != cad->final && natInfo(iter->dato) != natural){
      iter = iter->sig;
    }return iter->dato;
  }
}

TInfo primeroEnCadena(TCadena cad) {
  return cad->inicio->dato;
}

TCadena cadenaSiguiente(TCadena cad) {
  if (cad != NULL && cad->inicio != cad->final){
    if (cad->final->ant == cad->inicio){
      printf("\ncaso dos nodos\n");
      imprimirCadena(cad);
      TCadena res = cad;
      cad->inicio = cad->final;
      cad->final = res->inicio;
      cad->inicio->sig = cad->final;
      cad->final->ant = cad->inicio;
      cad->final->sig = NULL;

      imprimirCadena(cad);
      printf("\n\n");
      return cad;  
      printf("\n\n");
    }else{
      return cad;
    }

  }else{
    return cad;
  }
}

TCadena removerDeCadena(nat natural, TCadena cad) {
//    printf("\n\nejecuto remover\n\n");
  if (natInfo(cad->inicio->dato) == natural){
      if (cad->inicio == cad->final){
        TnodoCadena borrar = cad->inicio;
        liberarInfo(borrar->dato);
        delete borrar;
        cad = NULL;
      } else{
        TnodoCadena borrar = cad->inicio;
        cad->inicio = cad->inicio->sig;
        liberarInfo(borrar->dato);
        delete borrar;
      }
  }else{
    TnodoCadena iter = cad->inicio;
    while (iter->sig != NULL && natInfo(iter->sig->dato) != natural){
      iter = iter->sig;
    }if (iter->sig == cad->final){
      TnodoCadena borrar = iter->sig;
      cad->final = iter;
      iter->sig = NULL;
      liberarInfo(borrar->dato);
      delete borrar;
    }else{
      TnodoCadena borrar = iter->sig;
      iter->sig = iter->sig->sig;
      liberarInfo(borrar->dato);
      delete borrar;
      iter = NULL;
    }
  }
  
  return cad;
}

void imprimirCadena(TCadena cad) {
  //  printf("\n\nejecuto imprimir\n\n");
  if (cad != NULL){
    TnodoCadena iter = cad->inicio;
    printf("(%d,%.2f)",natInfo(iter->dato),realInfo(iter->dato));
    if (iter != cad->final){
      while (iter != cad->final){
        iter = iter->sig;
        printf("(%d,%.2f)",natInfo(iter->dato),realInfo(iter->dato));
      }
    }
    iter = NULL;
  }
  printf("\n");
}