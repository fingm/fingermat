/* 4913260 */ 

#include "../include/colCadenas.h"
#include "../include/cadena.h"
#include "../include/info.h"
#include "../include/utils.h"

struct _rep_colCadenas {
  TCadena dato[CANT_CADS-1];
  nat longitud;
};

static bool esVaciaColCadena(TColCadenas cad);
static void hacerLugar(TColCadenas cad);

TColCadenas crearColCadenas() {
  TColCadenas nueva = new _rep_colCadenas;
  nueva->longitud = 0;
  return nueva;
}

/* en siguientes tareas
void liberarColCadenas(TColCadenas col) {
}
*/

bool esVaciaColCadena(TColCadenas cad){
  return cad->longitud == 0;  
}

nat cantidadColCadenas(nat pos, TColCadenas col) {
  if (esVaciaColCadena(col)){
    return 0;
  }else{
   return cantidadEnCadena(col->dato[0]);
  }
}

bool estaEnColCadenas(nat natural, nat pos, TColCadenas col) {
  for (nat i =0; i <=col->longitud-1; i++){//PRUEBA DE CADENA
   imprimirCadena(col->dato[0]);
  }
 
  bool aux_bool = false;
  if (!esVaciaColCadena(col)){
  }
  return aux_bool;
}

void hacerLugar(TColCadenas cad){
  for (int i = cad->longitud-1; i>=0; i--){
    cad->dato[i] = cad->dato[i];    
  }
  cad->longitud = cad->longitud+1;
}

TColCadenas insertarEnColCadenas(nat natural, double real, nat pos,TColCadenas col) {
  TCadena cad = crearCadena();
  cad = insertarAlInicio(natural,real,cad);
  imprimirCadena(cad);
  if (esVaciaColCadena(col)){
     col->dato[0]= cad;
     col->longitud++;
  }else{
   hacerLugar(col);
   col->dato[0]= cad;
  }
  return col;
}

TInfo infoEnColCadenas(nat natural, nat pos, TColCadenas col) {
  return NULL;
}

TColCadenas removerDeColCadenas(nat natural, nat pos, TColCadenas col) {
  return NULL;
}
