#include <stdio.h>

struct nodoLista{
    int elem;
    nodoLista *sig;
};

typedef nodoLista *Lista;

bool esVaciaLista(Lista l){
    return l==NULL;
}

Lista CrearNodo(int dato){
    Lista nueva = new nodoLista;
    nueva->elem = dato;
    nueva->sig = NULL;
    return nueva;
}

Lista insertarOrdenado(Lista l,int elem){
    Lista nodo = CrearNodo(elem);
    if (esVaciaLista(l)){
        l=nodo;
    }
    return l;
}

void mostrarLista(Lista l){
    if(!esVaciaLista(l->sig)){
        mostrarLista(l->sig);
    }
}

int main (){

/*
int ptr1 = 5;
int *ptr = &ptr1;
*ptr = 334;
printf("%d",*ptr);
*/
Lista l = insertarOrdenado(l,4);




return 0;
}