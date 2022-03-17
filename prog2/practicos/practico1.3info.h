
// info . h

# ifndef _INFO_H
# define _INFO_H

#define MAX 4

/* Representaci ó n de TInfo */
typedef struct _rep_info * TInfo ;

/* Operaciones de TInfo */

/*Devuelve un ' TInfo ' compuesto por ' natural ' y ' real '.*/
TInfo crearInfo ( unsigned natural , double real ) ;

/*Devuelve el componente natural de ' info '.*/
unsigned natInfo ( TInfo info ) ;

/*Devuelve el componente real de ' info '.*/
double realInfo ( TInfo info ) ;

/*imprime elementos de tipo ' info '.*/
void imprimirInfo( TInfo info ) ;


# endif