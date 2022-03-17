//---------Ejercicio 2---------

//Considere ahora que cuenta con la siguiente interfaz del tipo de datos TFecha:

#include <stdio.h>

struct rep_fecha{
    unsigned int d;
    unsigned int m;
    unsigned int a;
};

typedef struct rep_fecha * TFecha ;

/* Devuelve un ' TFecha ' con dia d , mes m y a ñ o a */

TFecha crear_fecha ( unsigned int d , unsigned int m , unsigned int a ){
    TFecha nueva = new rep_fecha;
    nueva->d = d;
    nueva->m = m;
    nueva->a = a;
    return nueva;
}

/* Devuelve true si f1 es anterior a f2 , false en otro caso */

bool comparar_fechas ( TFecha f1 , TFecha f2 ){
  bool ordenado = true;
    if (f1->a > f2->a){
        ordenado = false;
    }else{
        if (f1->a == f2->a){
            if (f1->m > f2->m){
                ordenado = false;
            }else{
                if (f1->m == f2->m){
                    if (f1->d > f2->d){
                        ordenado = false;
                    }
                }
            }
        }
    }    
    return ordenado;
}

/* Devuelve el d í a correspondiente a fecha */
unsigned int dia ( TFecha fecha ){
    return fecha->d;
}

/* Devuelve el mes correspondiente a fecha */
unsigned int mes ( TFecha fecha ){
    return fecha->m;
}

/* Devuelve el a ñ o correspondiente a fecha */
unsigned int anio ( TFecha fecha ){
    return fecha->a;
}

void interCambiar(TFecha arr[],int pos1, int pos2){
    TFecha aux;
    aux = arr[pos1];
    arr[pos1] = arr[pos2];
    arr[pos2] = aux; 
}

void imprimirArreglo(TFecha arr[]){
    for (unsigned int i=0 ; i<=3; i++){
        printf("(%d/%d/%d) \n",dia(arr[i]),mes(arr[i]),anio(arr[i]));
    }
}

void ordenarArreglo(TFecha arr[]){
    for (int i =0; i<=2; i++){
        for (int j=i+1; j<=3; j++){
            if (!comparar_fechas(arr[i],arr[j])){
                interCambiar(arr,i,j);
            }
        }
    }
}


int main (){
    TFecha arregloFechas[4]={crear_fecha(22,3,2015),crear_fecha(19,4,2010),crear_fecha(21,2,1989),crear_fecha(9,12,2021)};
    ordenarArreglo(arregloFechas);
    imprimirArreglo(arregloFechas);
    return 0;
}