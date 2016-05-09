'''
Daniel Dingess
Dr. Liu
Programming Languages 
April 19, 2016
Python Lab 2: State Dictionary
'''

#declare global dictionary
states = {}

def main():
	#Open file for read
	f = open('populations.txt', 'r')
	#Parse file
	for line in f:
		temp = line.split()
		states[temp[0]]= temp[1]
	
	f.close()
	# Test Statement
	print states
	
	query =""
	# Keep getting user input 
	while query != 'exit':
		query = raw_input("Display population for which state? (or exit)\n")
	
		if query.upper() in states:
			print query.upper() + "\t" + states[query.upper()] + " Million"
		
		
if __name__ == "__main__":
	main()
