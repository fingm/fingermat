/*-----------------------jercicio 1 Promedio clase-----------------------------------

Suponga que a los estudiantes de programación 2 se les dice que su calificación final será el promedio de
las cuatro calificaciones más altas de entre las cinco que hayan obtenido en el curso.
  
    (a) Escribir una función llamada PromClase con cinco parámetros de entrada (las calificaciones obtenidas)
        y un parámetro de salida (la calificación promedio), que realice dicho cálculo

    (b) Escribir un programa principal (main()) que permita ejecutar la función PromClase. Dicho programa
        deberá leer de la entrada estándar (teclado) 5 calificaciones, invocar al procedimiento PromClase con
        dichos parámetros, y finalmente mostrar en la salida estándar (pantalla) el resultado.



# include <stdio.h>

float promClase(int a , int b, int c, int d){
    int min =a;
    if (b < min){
        min = b;
    }if (c < min){
        min = c;
    }if (d < min){
        min = d;
        }
    float prom = (a+b+c+d-min)/4;
    return prom;   
}


int main (){
printf("Ingrese los valores:");
int f,g,h,i;
scanf("%d %d %d %d",&f,&g,&h,&i);
float resultado = promClase(f,g,h,i);
printf("%f",resultado);
}*/

/*-------------------------Ejercicio 2 Primos--------------------------------------

    Escriba un procedimiento que calcule e imprima en pantalla todos los números primos entre dos enteros
    positivos A y B cualesquiera.*/

/*

#include <stdio.h>

void todosLosPrimos(int val1, int val2 ){
    for (int numero = val1 ; numero <= val2; numero++){
        int aux = 2;
        bool boolAuxSalida = false;
        bool esPrimo=true;
        while(aux <= numero/2 && !boolAuxSalida ){
            if (numero%aux == 0){
               boolAuxSalida=true;
               esPrimo= false;
            }
            aux++;
        }
        if  (esPrimo){
            printf("El numero %d es primo\n",numero);
        }
  
    }
}

int main(){
    int uno,dos;
    printf("Ingrese el rango de valores: ");
    scanf("%d %d",&uno,&dos);
    todosLosPrimos(uno,dos);
}*/

/*--------------------Ejercicio 3 Ocurrencias----------------

    Se quiere implementar una función que cuente la cantidad de veces que una letra aparece en una frase.
    La frase se representa como un arreglo de caracteres, y dado que se conoce que el largo máximo de una
    frase es de 100 caracteres, la frase se implementa como char frase[100] .

    Usando esta representación escriba una función Ocurrencias que recibe una frase, un natural llamado
    largo que representa el número de caracteres en la frase, y el caracter a buscar (almacenado en la variable
    letra), y devuelve el número de ocurrencias del carácter letra en el arreglo frase.*/

/*#include <stdio.h>

int Ocurrencias(char arreglo[],char letra,int cantCaracteres){
    int cont = 0;
    int cantidad=0;
    while(cont <= cantCaracteres){
        if (arreglo[cont] == letra){
            cantidad++;
        }
        cont++;
    }
    return cantidad;
}*/
#include <stdio.h>

void cargarArreglo(char arreglo[],int cantCaracteres){
    printf("Ingrese el texto: ");
    int cont=0;
    char charaux;
    while(cont <= cantCaracteres){
        scanf("%c",&charaux);
        arreglo[cont] = charaux;
        cont++;
    }
}

void recorrerArreglo(char arreglo[],int cantCaracteres){
    int cont = 0;
    while(cont <= cantCaracteres){
        printf("%c",arreglo[cont]);
        cont++;
    }
}
/*
int main (){
    char arregloTexto[100];
    char auxletra='s';
    cargarArreglo(arregloTexto,10);
    printf("\n");
    recorrerArreglo(arregloTexto,10);
    printf("La letra %c aparece %d veces",auxletra,Ocurrencias(arregloTexto,auxletra,10));

}*/


/*-----------------------------Ejercicio 4 Es Palíndrome---------------------------

    Considere ahora que la frase se representa como un arreglo de caracteres implementado como char *frase.

    (a) Qué diferencias hay entre esta representación y la que utilizó en el Ejercicio 3?

    (b) Escriba una función EsPalindrome que recibe una frase representada como un puntero a caracter y
    devuelve TRUE si la misma es un palíndrome, FALSE en otro caso.
    Ejercicio 5 Ordenar arreglo
    Escriba un procedimiento que recibe un arreglo de enteros y devuelve un nuevo arreglo que contiene a los
    elementos del primero en orden ascendente. Indique qué algoritmos de ordenación utiliza.
*/

void cargarArreglodePunteros (char arr[],char *arreglo[],int size){
    for (int i=0; i<=size; i++){
       arreglo[i] = &arr[i];
    }  
}

void mostrarArregloPunteros(char *arreglo[],int size ){
    for (int i=0; i<=size; i++){
       printf("%c",*arreglo[i]);
    }   
}
/*
bool esPalindrome(char *arr[],int size){
    int inicial=0;
    int final = size-1;
    bool  auxbool = true;
    while((inicial <= (size-1)/2) && auxbool){
        if (*arr[inicial] == *arr[final]){
            inicial ++;
            final--;
        }else{
            auxbool = false;
        } 
    }
    return auxbool;
}

int main () {
    char arreglo[10];
    cargarArreglo(arreglo,9);
    char *arreglos[10];
    cargarArreglodePunteros(arreglo,arreglos,10);
    mostrarArregloPunteros(arreglos,10);
    if (esPalindrome(arreglos,10)){
        printf("Es palindromo");
    }else{
        printf("No es");
    }
}*/
void cargarArregloEnteros(int arreglo[],int cantCaracteres){
    printf("Ingrese los valores: ");
    int cont=0;
    int intaux;
    while(cont <= cantCaracteres){
        scanf("%d",&intaux);
        arreglo[cont] = intaux;
        cont++;
    }
}
void recorrerArregloEnteros(int arreglo[],int cantCaracteres){
    int cont = 0;
    while(cont <= cantCaracteres){
        printf("%d",arreglo[cont]);
        cont++;
    }
}

bool ordenado(int arr[],int cantidad){
    int contador = 0;
    bool ordenauxiliar = true;
    
    while((contador <= cantidad-1) && (ordenauxiliar)){
        if (arr[contador] < arr[contador+1]){
            contador++;
        }else{
            ordenauxiliar = false;
        }
    }
    return ordenauxiliar;
}

void ordenarArreglo(int arr[]){

}


int main (){
    int arr[10];
    cargarArregloEnteros(arr,9);
    if (ordenado(arr,10)){
        printf("esta");
    }
}






