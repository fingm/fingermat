/* 4913260 */ 

#include "../include/cadena.h"
#include "../include/info.h"
#include "../include/utils.h"
#include <assert.h>

static bool esVaciaCadena(TCadena cad);



// los elementos se mantienen entre 0 y cantidad - 1, incluidos
struct _rep_cadena {
  TInfo dato[L];
  nat longitud;
};

bool esVaciaCadena(TCadena cad){
  return cad->dato == 0;
} 

TCadena crearCadena() {
  TCadena nueva = new _rep_cadena;
  nueva->longitud = 0;
  return nueva;
}

/* en siguientes tareas
void liberarCadena(TCadena cad) {
}
*/

nat cantidadEnCadena(TCadena cad) {
  if (!esVaciaCadena(cad)){
   return cad->longitud;
  } else return 0; 
}

bool estaEnCadena(nat natural, TCadena cad) {
return false;
}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {
 if (esVaciaCadena(cad)){
    cad->longitud++;
  }
  return cad;
}


TInfo infoCadena(nat natural, TCadena cad) {
  return NULL;
}

TCadena removerDeCadena(nat natural, TCadena cad) {
  return NULL;
}

void imprimirCadena(TCadena cad){
/*  if (!esVaciaCadena(cad)){
    for (nat i = 0; i <= cantidadEnCadena(cad); i++){
      printf("(%d,%4.2lf)",natInfo(cad->dato[i]),realInfo(cad->dato[i]));
    }
  }
    printf("\n");*/
}
 