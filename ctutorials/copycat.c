#include <stdio.h>

//Copy input to output
main(){
	int c, nc, next;
	/*
	c = getchar();
	while (c != EOF){
	putchar(c);
	c=getchar();
	}
	*/
	nc = 0;
	//Condensed version:
	while ((c = getchar()) != EOF){
		++nc;
		//Comment out putchar(c) and uncomment printf() for count
		putchar(c);
		/*Char count
		printf("%1d\n", nc);
		*/
	}
	
	
}
