#!/bin/bash
#delete all users of txt file
file=$1
while read line; 
do
	userdel $line
done < "$file"
