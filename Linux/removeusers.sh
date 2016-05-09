#!/bin/bash
#removes users from home directory

file=$1
while read line; do
	userdel -r $line
done < "$file"
