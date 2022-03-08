/* 4913260 */ 

#include "../include/cadena.h"
#include "../include/info.h"
#include "../include/utils.h"
#include <assert.h>

// los elementos se mantienen entre 0 y cantidad - 1, incluidos
struct _rep_cadena {
  TInfo dato;
  nat longitud;
};

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
  if (cad != NULL){
   return cad->longitud;
  } else return 0; 
}

bool estaEnCadena(nat natural, TCadena cad) {
return false;
}

TCadena insertarAlInicio(nat natural, double real, TCadena cad) {
  cad = crearCadena();
  cad->longitud++;
  cad->dato = crearInfo(natural,real);
  return cad;
}


TInfo infoCadena(nat natural, TCadena cad) {
  return NULL;
}

TCadena removerDeCadena(nat natural, TCadena cad) {
  return NULL;
}

void imprimirCadena(TCadena cad){
  if (cad == NULL){
    printf("\n");
  }else{
    char aux = infoATexto(copiaInfo(cad->dato))[0];
    printf("%c\n",aux );
  }
}
 