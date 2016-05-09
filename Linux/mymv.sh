#!/bin/bash
#MYMOV (replace mv) 

#declare file names
SRC="$1"
DEST="$2"
TEMP="$DEST"
count=`expr 1`

#check if the source is valid
if [ -z "$1" ]
then
	exit
fi

#check if the destination is valid
if [ -z "$2" ]
then
	exit
fi

#append numbers for same named files
while [ -e "$TEMP" ]
do	
	TEMP="$DEST.$count"
	count=`expr $count + 1`
done
DEST="$TEMP"

#move new file to destination
`mv "$SRC" "$DEST"`



