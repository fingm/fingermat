/*---------------------PRACTICO 3---------------------------
-------------------Memoria Dinamica-----------------------*/


//------------------Ejercicio 2-----------------------------

#include <stdio.h>
#include <assert.h>

typedef unsigned int uint;

struct nodo{
    uint elem;
    nodo *sig;
};

typedef nodo *lista;

void insOrd(lista &l, uint dato){
    lista nueva = new nodo;
    nueva->elem = dato;
    nueva->sig = NULL;
    if (l == NULL){
        l = nueva;
    }else if (dato <= l->elem){
        lista aux = l;
        l = nueva;
        nueva->sig = aux;
    }else{
        lista aux = l;
        while(aux->sig != NULL && aux->sig->elem <= dato){
            aux = aux->sig;
        }
        if (aux != NULL){
            lista aux2 = aux->sig;
            aux->sig = nueva;
            nueva->sig = aux2;    
        }
    }
}

void mostrarLista(lista l){
    if (l != NULL){
        printf("\nla lista ingresada es : ");
        while (l != NULL){
            printf(" %d ",l->elem);
            l = l->sig;
        }
    }else{
        printf("\n..Lista Vacia..");
    }
}

lista take (lista l, uint i){
    if(l == NULL || i==0){
        return NULL;
    }else{
        lista nueva = new nodo;
        nueva=NULL;
        uint counter=1;
        while (l!= NULL && counter <=i){
            lista nod = new nodo;
            nod->elem = l->elem;
            nod->sig = NULL;
            
            if (nueva == NULL){
                nueva = nod;
            }else{
                lista aux = nueva;
                while(aux->sig != NULL){
                    aux = aux->sig;
                }
                aux->sig = nod;
            }
            l = l->sig;
            counter++;
        }
        return nueva;
    } 
}

int main(){

    lista l = new nodo;
    l = NULL;
    insOrd(l,2);
    insOrd(l,4);
    insOrd(l,5);
    insOrd(l,6);
    insOrd(l,8);
    mostrarLista(l);
    lista n = new nodo;
    n = NULL;
    n = take(l,7);
    mostrarLista(n);


}