#include<iostream>

using namespace std;

int main(){

/* AQUI HOLA SAMUEL PUDISTE EDITAR*/
    uint16_t var_1 = 620;
    
    uint8_t primero=0;
    uint8_t segundo=0;
    primero =(uint8_t) var_1;
    segundo =(uint8_t) (var_1 >> 8);
    cout<<"VAR_1:  "<<((int)primero)<<endl;
    cout<<"VAR_2:  "<<((int)segundo)<<endl;
}
