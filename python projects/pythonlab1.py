'''
Daniel Dingess
Dr. Liu
Programming Languages 
April 7, 2016
Python Lab 1 
'''
print "\nFrom python.py:"
#run module to get that file's output
from python import tax

#main
print "==============================="
print "pythonlab1.py Main:"
def main():

	print "Imported tax function:"
	print tax(100)
	print tax(300)
	print tax(1000)
	
if __name__ == "__main__":
	main()
