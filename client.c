
#include <stdio.h> //printf
#include <string.h>    //strlen
#include <stdlib.h>
#include <sys/socket.h>    //socket
#include <arpa/inet.h> //inet_addr

#define MAXRCVLEN 200
#define STRLEN 200
 
int main(int argc , char *argv[])
{
    int sock;
    struct sockaddr_in server;
    char message[1000] , server_reply[2000];
     
    //Create socket
    sock = socket(AF_INET , SOCK_STREAM , 0);
    if (sock == -1)
    {
        printf("Could not create socket");
    }
    puts("Socket created");
     
    server.sin_addr.s_addr = inet_addr("127.0.0.1");
    server.sin_family = AF_INET;
    server.sin_port = htons( 8888 );
 
    //Connect to remote server
    if (connect(sock , (struct sockaddr *)&server , sizeof(server)) < 0)
    {
        perror("connect failed. Error");
        return 1;
    }
     
    puts("Connected\n");
     printf("\n*******************SACCO*****************\n");
     printf("please login by writing login and username\n");
    //keep communicating with server
       char buffer[MAXRCVLEN];
       char name[STRLEN];
       /*printf("Enter your firstname:\n");
       sscanf(buffer,"%s",name);
       sprintf(buffer,"%s",name);
       send(sock,buffer,strlen(buffer),0);*/
    while(1)
    {
		fgets(buffer, sizeof(buffer), stdin);
		 buffer[strlen(buffer)-1] = '\0';
		 char arg1[STRLEN], arg2[STRLEN],arg3[STRLEN],arg4[STRLEN],memberId[STRLEN];
		 char name[STRLEN];
		 int n = sscanf(buffer, "%s %s %s %s %s", arg1,arg2,arg3,arg4,name);
		
	     int m=sscanf(buffer,"%s %s",arg1,arg2);

	            
	     //commands comparision  
		if (strcmp(arg1,"login")==0&&m>1)
		{
			/* code */
			sprintf(buffer,"%s\t%s",arg1,arg2);
			
		}else
			if(strcmp(arg1,"contribution")==0){
			sprintf(buffer,"%s:|%s\t|%s|%s\n",arg1,arg2,arg3,arg4);
		
		  }
			
		else if(strcmp(arg1,"loan")==0){
			if(strcmp(arg2,"request")==0){
				char *both=strcat(arg1,arg2);
				sprintf(buffer,"%s:%s\t |%s\n",both,arg3,arg4);
			}
			else if(strcmp(arg2,"status")==0){
				printf("This is loan status\n");
			}
			else if(strcmp(arg2,"details")==0){
				printf("This is loan repaymennt details\n");
			}
			
			}
		else if(strcmp(arg1,"idea")==0){
			sprintf(buffer,"%s:%s\t |%s\t|%s",arg1,arg2,arg3,arg4);
		}
		
		else if ((strcmp(arg1,"check")&&strcmp(arg2,"contribution"))==0){
		printf("This is check contribution\n");
		}
		
		else if((strcmp(arg1,"check")&& strcmp(arg2,"benefits"))==0){
			printf("This is check benefits\n");
		}else if(strcmp(arg1,"loan")==0&&strcmp(arg2,"payment")==0)
		{
			/* code */
			printf("This is check benefits\n");
		}
	
		else if(strcmp(arg1,"logout")==0)
				{
			printf("Goodbye customer\n");
					
		   return EXIT_SUCCESS;
		}
		
		else{
			printf("\n");
		}
         printf("message sent is:%s\n",buffer);
			send(sock,buffer,strlen(buffer),0);
        //Receive a reply from the server
        if( recv(sock , server_reply , 2000 , 0) < 0)
        {
            puts("recv failed");
            break;
        }
         
        puts("Server reply :");
        puts(server_reply);
    }
    //send(sock,name,strlen(name),0);

    return 0;
}
