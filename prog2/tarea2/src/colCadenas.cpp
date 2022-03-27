/* 4913260 */ 

#include "../include/colCadenas.h"
#include "../include/cadena.h"
#include "../include/info.h"
#include "../include/utils.h"
#include <assert.h>



struct _rep_colCadenas {
  TCadena lugar[CANT_CADS-1];
};

TColCadenas crearColCadenas() {
  return NULL;
}

void liberarColCadenas(TColCadenas col) {
}

TCadena cadenaDeColCadenas(nat pos, TColCadenas col) {
  return NULL;
}



nat cantidadColCadenas(nat pos, TColCadenas col) {
  return cantidadEnCadena(col->lugar[pos]);
}

bool estaEnColCadenas(nat natural, nat pos, TColCadenas col) {
  return estaEnCadena(natural,col->lugar[pos]);
}

TColCadenas insertarEnColCadenas(nat natural, double real, nat pos,TColCadenas col) {
  col->lugar[pos] = insertarAlInicio(natural,real,col->lugar[pos]);
  return col;
}

TInfo infoEnColCadenas(nat natural, nat pos, TColCadenas col) {
  TInfo nuevo  = infoCadena(natural , col->lugar[pos]);
  return nuevo;
}

TColCadenas removerDeColCadenas(nat natural, nat pos, TColCadenas col) {
  col->lugar[pos] = removerDeCadena(natural,col->lugar[pos]);
  return col;
}

