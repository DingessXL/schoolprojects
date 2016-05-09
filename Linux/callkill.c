/*
Daniel Dingess
Linux Programming

Purpose: 
Write a program to catch all signals sent to it and print out which signal was sent.
Then issue a "kill -9" command to the process.  How is SIGKILL different from the other signals?
*/

#include <stdio.h>
#include <signal.h>
#include <unistd.h>
#include <stdlib.h>

//Catches signals 
void sig_handler(int signo){
	printf("\nCaught: %d\n", signo);
	//exit(signo);
}

void alarm_handler(int sig)
{
	signal(SIGALRM, SIG_IGN);
	signal(SIGKILL, sig_handler);
	signal(SIGALRM, alarm_handler);
}

//Main 
int main(int argc, char *argv[])
{
	
	if(signal(SIGINT, sig_handler) == SIG_ERR) {
		printf("\nCan't catch SIGINT\n");
	}
	alarm(3);
	
	while(1) {
		sleep(1);
	}
	return 0;
}

