//------------------PRACTICO 1-----------------------

//---------Ejercicio 1---------

/*Implemente una funcion main() que inicialice un areglo de fechas, lo ordene e imprima el resultado*/

#include <stdio.h>
#define L 4

struct rep_fecha{
    unsigned int d;
    unsigned int m;
    unsigned int a;
};

void interCambiar(rep_fecha arr[],int pos1, int pos2){
    rep_fecha aux;
    aux = arr[pos1];
    arr[pos1] = arr[pos2];
    arr[pos2] = aux; 
}

bool estaOrdenado(rep_fecha arr[]){
    bool ordenado = true;
    int i =0;
    while (i<= L-1 && ordenado){
        if (arr[i].a > arr[i+1].a){
            ordenado = false;
        }else{
            if (arr[i].a == arr[i+1].a){
                if (arr[i].m > arr[i+1].m){
                    ordenado = false;
                }else{
                    if (arr[i].m == arr[i+1].m){
                        if (arr[i].d > arr[i+1].d){
                            ordenado = false;
                        }
                    }
                }
            }
        }
        i++;    
    }
    return ordenado;
}

void ordenar(rep_fecha arr[]){
    while (!estaOrdenado(arr)){
        for (int i = 0; i <= L-1; i++){
            if (arr[i].a > arr[i+1].a){
                interCambiar (arr,i,i+1);
            }else{
                if (arr[i].a == arr[i+1].a){
                    if (arr[i].m > arr[i+1].m){
                        interCambiar (arr,i,i+1);
                    }else{
                        if (arr[i].m == arr[i+1].m){
                            if (arr[i].d > arr[i+1].d){
                                interCambiar (arr,i,i+1);
                            }
                        }
                    }
                }
            }    
        }
    }
}

void imprimirArreglo(rep_fecha arr[]){
    for (unsigned int i=0 ; i<=L-1; i++){
        printf("(%d/%d/%d) \n",arr[i].d,arr[i].m,arr[i].a);
    }
}

int main(){
   
    rep_fecha arreglo[L];
 
    arreglo[0] = {19,4,2010};    
    arreglo[1] = {22,3,2015};
    arreglo[2] = {21,2,1989};
    arreglo[3] = {9,12,2021};

    ordenar(arreglo);
    imprimirArreglo(arreglo);
    return 0;
}

