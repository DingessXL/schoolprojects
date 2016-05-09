#!/bin/bash
file=$1

echo "Users Added:" > usersAdded.txt
while read line; 
do
	echo $line
        echo $line >> usersAdded.txt
#create random password
    	pass=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 8| head -n 1 ) 
#report password
    	echo $pass
        echo $pass >> usersAdded.txt

#addUser:
#mkdir /home/$line
	useradd -m $line

#set pass for user
	echo $line:$password | chpasswd
done < "$file"


