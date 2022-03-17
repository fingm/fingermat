#include <stdio.h>

typedef unsigned int uint;


/*-----------Ejercicio 1 -------------------//

(a) Ordena A[1..n] de manera creciente*/

void insertarOrdenado(float * A, uint n, float e){
    if (n ==0 || e>=A[n]) {//RECURSIVO
        A[n+1]=e;
    }else{
        A[n+1] = A[n];
        insertarOrdenado(A,n-1,e);
    }
}

void ordenar (float *A, uint n){
    if (n>1){
        ordenar(A,n-1);
        insertarOrdenado(A,n-1,A[n]);
    }
}

/*void mostrarCadena(float *A){ ITERATIVO
    for (int i =0; i<=9; i++){
        printf("%f - \n",A[i]);

    }
}*/

void mostrarCadena(float *A,uint tope){//RECURSIVO
    if (tope>1){
        mostrarCadena(A,tope-1);
        printf("%f ",A[tope]);
    } 
}

/*
void insertarOrdenado(float * A, uint n, float e){//iterativo
    while ((n>0) && (e<A[n])){
        A[n+1]=A[n];
        n--;
    }
    A[n+1] = e;
}*/


//-----------Ejercicio 2 -------------------//
//Implemente un algoritmo recursivo que determina si un string es palíndrome. El string está representado en un arreglo.

/*........ ESTA VERSION TIENE MENOS CODIGO..........
bool esPalindromeRec(char *frase,uint inf, uint sup){
    return inf>=sup || (frase[inf] == frase[sup] && esPalindromeRec(frase,inf+1,sup-1));
}*/
bool esPalindromeRec(char *frase,uint inf, uint sup){
    bool res;
    if (inf>=sup){
        return true;
    }else if (frase[inf] != frase[sup]){
        return false;
    }else{
        res = esPalindromeRec(frase,inf+1,sup-1);
    }
    return res;
}

bool esPalindrome(char *frase, uint largo){
    return esPalindromeRec(frase,0,largo-1);
}

/*-----------Ejercicio 4 -------------------
----------Maximo comun divisor----------------*/

int MCD (uint x,uint y){
    if (y==0){
        return x;
    }else{
       return MCD(y,x%y);
    }
}

/*-----------Ejercicio 5 -------------------
-----------Torrees de Hanoi -------------------
Implemente un algoritmo recursivo que determina si un string es palíndrome. El string está representado en un arreglo.*/

void hanoiAux(uint n,char origen, char intermedia, char destino){
    if (n>0){
        if (n==1){
            printf("%d %c %c\n",1,origen,destino);
        }else{
            hanoiAux(n-1,origen,destino,intermedia);
            printf("%d %c %c\n",n,origen,destino);
            hanoiAux(n-1,intermedia,origen,destino);
        }
    }
}
void hanoi(uint n){
    hanoiAux(n,'A','B','C');
}

/*-----------Ejercicio 6 -------------------
--------------factorial--------------------*/

int factorial(uint numero) {
    if (numero<=1){
        return 1;
    }else{
        return numero*(factorial(numero-1));
    }
}

/*-----------Ejercicio 10 -------------------
--------------fibonacci--------------------*/

uint fibonacciRecursivo(uint cant){
    if (cant < 2){
        return cant;
    }else{
        return fibonacciRecursivo(cant-1) +fibonacciRecursivo(cant-2);
    }
}


int main(){

    printf("----------Comienza ejercicio 1--------------- \n\n");
    float A[10] = {1,37,12,3,4,25,6,7,8,9};
    printf("Esta es la cadena original: \n\n");
    mostrarCadena(A,9);
    printf("\n");
    ordenar(A,9);
    printf("\nEsta es la cadena ordenada: \n\n");
    mostrarCadena(A,9);
   
    printf("\n\n----------Comienza ejercicio 2---------------\n\n ");
    
    char frase[5]={'1','5','3','5','1'};

    if (esPalindrome(frase,5)){
        printf("Es palindrome\n");
    }else{
        printf("No es palindrome\n");
    }
    printf("\n\n----------Comienza ejercicio 4---------------\n\n ");
    
    uint numeroA = 80;
    uint numeroB = 36;
    printf("El maximo comun divisor entre %d y %d es : %d",numeroA,numeroB,MCD(numeroA,numeroB));

    printf("\n\n----------Comienza ejercicio 5---------------\n\n ");

    hanoi(3);

    printf("\n\n----------Comienza ejercicio 6---------------\n\n ");

    uint fact =5;
    printf("El factorial de %d es : %d\n",fact, factorial(fact));

    printf("\n\n----------Comienza ejercicio 10---------------\n\n ");

    uint fibonacci=10;
    printf("Fibonacci de %d es : %d\n",fibonacci,fibonacciRecursivo(fibonacci));
}
