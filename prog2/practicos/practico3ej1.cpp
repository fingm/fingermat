/*---------------------PRACTICO 3---------------------------
-------------------Memoria Dinamica-----------------------*/


//------------------Ejercicio 1-----------------------------

#include <stdio.h>
#include <assert.h>

typedef unsigned int uint;

struct nodo{
    uint elem;
    nodo *sig;
};

typedef nodo *lista;

bool esVaciaLista(lista l){
    return l==NULL;
}

uint last(lista l){
    if (l->sig != NULL){
        while(l->sig != NULL){
            l= l->sig;
        }
    }
    return l->elem;
}

float average(lista l){
    if (l->sig == NULL){
        return l->elem;
    }else{
        float cantidad=0;
        float suma=0;
        while(l != NULL){
            suma = suma + l->elem;
            cantidad++;
            l = l->sig;
        }
        return suma/cantidad;
    }
}

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

void snoc(lista &l, uint elem){
    lista nodoAux = new nodo;
    nodoAux->elem = elem;
    nodoAux->sig = NULL;
    if (l == NULL){
        l = nodoAux;
    }else{
        lista aux = l;
        while (aux->sig != NULL){
            aux = aux->sig;
        }
        aux->sig = nodoAux;
        aux = NULL;  
    }
}

void removeAll(lista &l, uint e){
    if (l != NULL){
        if (l->elem == e){
            if (l->sig == NULL){
                l = NULL;
            }else{
                lista aux = l;
                l = l->sig;
                aux->sig = NULL;
                delete aux;
            }
        }else{
            lista aux = l;
            while (aux->sig != NULL && aux->sig->elem != e){
                aux = aux->sig;
            }
            if (aux->sig->elem == e){
                if (aux->sig->sig == NULL){
                   aux->sig = NULL;     
                }else{
                    lista aux2 = aux;
                    aux2 = aux2->sig->sig;
                    aux->sig = aux2;
                }
            }
        }
    }
}

bool isIncluded(lista uno, lista dos){

    bool incluida= false;
    if ( uno != NULL){
        if (uno == NULL && dos == NULL){
            incluida = true;
        }else{
            if (uno->elem == dos->elem){
                if (uno->sig == NULL){
                    incluida = true;
                }else{
                while(uno->sig != NULL && dos->sig != NULL &&  uno->elem == dos->elem){
                    uno= uno->sig;
                    dos = dos->sig;
                }incluida = uno->elem == dos->elem; 
                }
            }else{
                while(uno->sig != NULL && uno->elem != dos->elem){
                    dos = dos->sig;
                }if (uno->sig == NULL){
                    incluida = true;
                }else{
                    while(uno->sig != NULL && dos->sig != NULL &&  uno->elem == dos->elem){
                        uno= uno->sig;
                        dos = dos->sig;
                    }incluida = uno->elem == dos->elem; 
                }
            }
        }
    }
    return incluida;
}


int main(){
   /* lista lst = new nodo;
    lst = NULL;
    insOrd(lst,9);
    insOrd(lst,7);
    insOrd(lst,5);
    insOrd(lst,1);
    mostrarLista(lst);
    printf("\nEl promedio de la lista es : %.2f",average(lst));
    printf("\nEl ultimo elemento de la lista es : %d",last(lst));
    snoc (lst, 22);
    snoc (lst,12);
    snoc (lst,12);
    snoc (lst,1);
    mostrarLista(lst);
    removeAll(lst,5);
    mostrarLista(lst);*/
    lista uno,dos = new nodo;
    uno = NULL;
    dos = NULL;
    

      insOrd(uno,5);
    insOrd(uno,3);
    insOrd(uno,4);
    
    insOrd(dos,3);
    insOrd(dos,6);
    insOrd(dos,4);
    insOrd(dos,5);



    mostrarLista(uno);
    mostrarLista(dos);
    if (isIncluded(uno,dos)){
        printf("\n.....Incluida....");
    }else{
         printf("\n.....NO Incluida....");   
    }

  
}
