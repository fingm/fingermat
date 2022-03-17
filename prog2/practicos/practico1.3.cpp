#include "practico1.3info.h"
#include <stdio.h>

struct _rep_info{
    unsigned edad;
    double altura;
};

/* Representaci ó n de TInfo */
typedef struct _rep_info * TInfo ;

/* Operaciones de TInfo */

/*Devuelve un ' TInfo ' compuesto por ' natural ' y ' real '.*/
TInfo crearInfo ( unsigned natural , double real ){
    TInfo nuevo   = new _rep_info;
    nuevo->edad   = natural;
    nuevo->altura = real;
    return nuevo;
}

/*Devuelve el componente natural de ' info '.*/
unsigned natInfo ( TInfo info ){
    return info->edad;
}

/*Devuelve el componente real de ' info '.*/
double realInfo ( TInfo info ){
    return info->altura;
}

/*imprime elementos de tipo ' info '.*/
void imprimirInfo( TInfo info ){
    printf("(%d,%4.2lf)",natInfo(info),realInfo(info));
}

