while true; do
read "What process do you want to kill (-1 to exit)" input
if[0 -lt $input] 2>/dev/null
	echo "hi"
elif [input -eq -1]
	exit 1
else
	echo "Not a process";
fi
