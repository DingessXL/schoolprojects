#include <stdio.h>

main()
{

float f, c;
int low,up,step;

low = 0;
up=300;
step = 20;

f = low;
// Print celcius for fahrenheits of 0-300, by 20's:
//With while loop:
while(f <= up){
c = 5 * (f-32) / 9;
printf("%3.0f %6.1f\n", f , c);
f = f+step;
}
// With for loop:
int fa;
for(fa = 0; fa <= 300; fa = fa+20){
printf("%3d %6.1f\n",fa, (5.0/9.0)*(fa-32));
}
// With recursion:
fa = 0;
void ftoc(int fahr){
	if(fahr <= 300)
		printf("%3d %6.1f\n", fahr, (5.0/9.0)*(fahr-32));
	ftoc(fahr+20);
	
}
ftoc(fa);
}
