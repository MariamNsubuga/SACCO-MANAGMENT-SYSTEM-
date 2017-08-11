#include <stdio.h>
#include <string.h>    //strlen
#include <sys/socket.h>
#include <stdlib.h>
#include <arpa/inet.h> //inet_addr
#include <unistd.h> 
#include <errno.h>
#include <netdb.h>
#include <mysql/mysql.h>

#define MAXRCVLEN 2000
#define STRLEN 2000

static char *host ="localhost";
static char *user ="root";
static char *pass ="";
static  char *dbname ="Sacco";

unsigned int port =3306;
static char *unix_socket ="/opt/lampp/var/mysql/mysql.sock";
unsigned int flag =0;

static MYSQL *conn;
static MYSQL_ROW row;
static MYSQL_RES *res;

    
 
int main(int argc , char *argv[])
{
    int socket_desc , client_sock , c , i,read_size;
    struct sockaddr_in server , client;
    char buf[2000],server_reply[2000],buffer[2000];
    
    //declaration of mysql functions
      MYSQL *conn;
	  MYSQL_RES *res;
      MYSQL_ROW row;
      conn  = mysql_init(NULL);
      
      if(!(mysql_real_connect(conn,host,user,pass,dbname,port,unix_socket,flag))){

         fprintf(stderr,"Error%s[%d]\n",mysql_error(conn),mysql_errno(conn));
             exit(1);
          }
     
    //Create socket
    socket_desc = socket(AF_INET , SOCK_STREAM , 0);
    if (socket_desc == -1)
    {
        printf("Could not create socket");
    }
    puts("Socket created");
     
    //Prepare the sockaddr_in structure
    server.sin_family = AF_INET;
    server.sin_addr.s_addr = INADDR_ANY;
    server.sin_port = htons( 8888 );
     
    //Bind
    if( bind(socket_desc,(struct sockaddr *)&server , sizeof(server)) < 0)
    {
        //print the error message
        perror("bind failed. Error");
        return 1;
    }
    puts("bind done");
     
    //Listen
    listen(socket_desc , 3);
     
    //Accept and incoming connection
    puts("Waiting for incoming connections...");
    c = sizeof(struct sockaddr_in);
     
    //accept connection from an incoming client
    client_sock = accept(socket_desc, (struct sockaddr *)&client, (socklen_t*)&c);
    if (client_sock < 0)
    {
        perror("accept failed");
        return 1;
    }
    puts("Connection accepted");
     
    //Receive a message from client
    char* fr_name ="/opt/lampp/htdocs/recess/test2.txt";
    FILE *fr = fopen(fr_name, "a+");
    while( (read_size = recv(client_sock , buf , 2000 , 0)) > 0 )
    {
		
			if (fr == NULL)
		    {
   		      printf("Error opening file!\n");
   		       exit(1);
		    }
		    
            fprintf(fr, "\r%s\n",buf);
        //Send the message back to client
       //write(client_sock ,buf , strlen(buf));
			puts("message received");
		    puts(buf);
		
		char arg1[STRLEN],arg2[STRLEN],arg3[STRLEN],arg4[STRLEN],name[STRLEN],stmt_buf[2000],buff[2000],buffer[2000],s_buf[2000];
		int n=sscanf(buf,"%s %s %s %s %s", arg1,arg2,arg3,arg4,name);

		if (strcmp(arg1,"login")==0&&arg2!=NULL)
		{
			/* code */
			  
			strcpy(name,arg2);
		  snprintf(stmt_buf,sizeof stmt_buf,"SELECT  Password FROM Member WHERE FirstName=('%s');",name);
			if(mysql_query(conn,stmt_buf)){
		fprintf(stderr,"%s\n",mysql_error(conn));
			printf("ERRO %s",mysql_error(conn));
		  }
			res=mysql_store_result(conn);
	         while(row =mysql_fetch_row(res))
               {
                         /* code */
                    sprintf(stmt_buf,"%s\n",row[0]);    
             } 
              write(client_sock ,stmt_buf , strlen(stmt_buf));
				puts(stmt_buf);
			
           //sprintf(buf," loggedin",name);
	    }else if(strcmp(arg1,"contribution")==0&&arg2!=NULL){
		
		puts(buf);
		//write(client_sock ,s_buf , strlen(s_buf));
		//fprintf(fr, "\r%s\n",buf);
		
		}else if(strcmp(arg1,"idea")==0){
		puts(buffer);
		
		
		//fclose(fr);
		
		}else if(strcmp(arg1,"benefits")==0 && strcmp(arg2,"check")==0){
		      
		     snprintf(buff,sizeof buff,"SELECT  Amount FROM Benefit WHERE Username=('%s');",name);
			if(mysql_query(conn,buff)){
		    fprintf(stderr,"%s\n",mysql_error(conn));
			printf("ERRO %s",mysql_error(conn));
		 }
			res=mysql_store_result(conn);
			while(row=mysql_fetch_row(res)){
			sprintf(buff,"%s\n",row[0]);
			}
			write(client_sock ,buff , strlen(buff));
		     puts(buff);
		}else if(strcmp(arg1,"check")==0 && strcmp(arg2,"contribution")==0){
			
		   snprintf(buf,2000,"SELECT Amount FROM contributions WHERE name=('%s')",name);
		   if(mysql_query(conn,buf)){
		    fprintf(stderr,"%s\n",mysql_error(conn));
			printf("ERRO %s",mysql_error(conn));
		     }
           res =mysql_store_result(conn);
           while(row =mysql_fetch_row(res))
             {
                        /* code */
                sprintf(buf,"%s\n",row[0]);    
               }
			write(client_sock ,buf , strlen(buf));
		    puts(buf);
		}else if(strcmp(arg1,"Loan")==0&&strcmp(arg2,"status")==0){
		write(client_sock ,s_buf , strlen(s_buf));
		puts(s_buf);
		}else if(strcmp(arg1,"Loan")==0&&strcmp(arg2,"Request")==0){
		puts(buf);
	
		}else if(strcmp(arg1,"Loan")==0&&strcmp(arg2,"details")==0){
		write(client_sock ,buffer, strlen(buffer));
		puts(buffer);
		}else if (strcmp(arg1,"Loan")==0&&strcmp(arg2,"payment")==0)
		{
		puts(buf);
		}else if (strcmp(arg1,"logout")==0)
		{
			/* code */
			sprintf(buf,"Your loggedout!");
			write(client_sock ,buf , strlen(buf));
			return EXIT_SUCCESS;
			
		}
     
    if(read_size == 0)
    {
        puts("Client disconnected");
        fflush(stdout);
    }
    else if(read_size == -1)
    {
        perror("recv failed");
    }
	puts("Server reply :");
        puts(server_reply);
}
	 

    return 0;
}
