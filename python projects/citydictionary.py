'''
Daniel Dingess
Dr. Liu
Programming Languages 
April 14, 2016
Python Lab 2: City Dictionary

Disclaimer: ASSIGNMENT DONE WITH CITIES AND NOT STATES.
'''

# The dictionary is declared outside all method to make it global.
cities = {'New York City' : 8491079, 'Los Angeles': 3928864, 'Chicago' : 2722389, 'Houston': 2239558, 'Philadelpia': 1560297}

# Functions for each input case in main()
# Return population or error msg, base on user input.
def citypop():
	city = raw_input('Enter a city');
	if city in cities:
		return str(cities[city])
	else:
		return 'Sorry, the state %s is not found' %(city)
		
# Add a city to the list.		
def addcity():
# No need to check if it already exists because it will overwrite, but this will just make sure you want to do what you want to do :).
	print 'Adding to list...'
	newcity = raw_input('Enter a city:')
	if newcity.title() in cities:
		yOrNo = raw_input('Entry exists, would you like to overwrite? (Y/N)')
		#while not done
		while yOrNo != '':
			if yOrNo.upper() == 'Y':
				# Cast input to integer so no conflicts with the dictionary.
				newpop = int(raw_input('Enter population for that city: \n'))
				cities[newcity.title()]= newpop
				return 'City population updated.\n';
			elif yOrNo.upper() == 'N':
				return 'City not added. \n'
			else:
				print 'Invalid input. Would you like to overwrite? (Y/N)'
	else:
		newpop = int(raw_input('Enter population for that city: \n'))
		cities[newcity.title()]= newpop
		return 'City added. \n'	
			
# Returns a ascending ordered dictionary clone of the global dictionary.
def viewcities():
	sorted_cities = sorted(cities.items(), key=lambda x: x[1])
	for key, value in sorted_cities:
		print '%s:\t%s' %(key,value)
	return "End of List."
	
# Delete city from the dictionary.
def delcity():
	removed = raw_input('Enter city to be removed:')
	# Title makes the first letter of a word upper-case and the rest lower-case.
	if removed.title() in cities:
		del cities[removed.title()]
		return 'Deleted. \n';
	else:
		return 'Sorry, the city %s is not found \n' %(removed)
		
# Help fucntion displays functionality of methods for user.
def help():
	return '''\nInputs\t\tFunctionality
			  \nGET\t- \tDiscover the populayion of a cirt.
			  \nVIEW\t- \tView an ordered list of cities and their populations.
			  \nADD\t- \tAdd a city to the list.
			  \nDEL\t- \tDelete a city from the dictionary.
			  \nEXIT\t- \tQuit the program.\n'''
def main():
# Loop until exit or termination. 
	while input != '':
		i = raw_input('Enter: get, view, add, delete, exit, or help... \n')
		# Input is case insensitive with lower()
		# Cases to call above functions
		if i.lower() == 'get':
			print(citypop())
		elif i.lower() == 'view':
			print viewcities()
		elif i.lower() == 'add':
			print(addcity())
		elif i.lower() == 'delete':
			print(delcity())
		elif i.lower() == 'exit':
			quit()
		elif i.lower() == 'help':
			print(help())
		else: 
			print 'Not a command. Please enter: get, view, add, delete, exit, or help.'
#Call main method so code outside of it doesn't execute on its own.
if __name__ == "__main__":
	main()

