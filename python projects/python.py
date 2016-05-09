'''
Daniel Dingess
Dr. Liu
Programming Languages 
April 7, 2016
Python Lab 1
'''
import math
from fractions import *

print "hello world \n"

#1.1  and 1.2 area of ring functions
def areaOfRing(outer=10, inner=5):
	x = outer**2
	y = inner**2
	a = (x-y)*math.pi
	return a;
#function calls	
print "==============================="
print "area of outer = 4, inner =2"
print areaOfRing(4,2)
#default test
print "defaults are outer=10, inner=5"
print areaOfRing()


#2.1tax
def tax(gross):
	if gross<240:
		t = 0
	elif(gross>240 and gross<480):
		t = gross*.15
	else:
		t = gross*.28
	return t;

#function calls
print "==============================="
print "tax of 100"
print tax(100)
print "tax of 300"
print tax(300)
print "tax of 1000"
print tax(1000)

#2.2 in pythonlab1.py

#3 find sum of range of fractions
def sumFractions(num):
	temp = 0
	for i in range(1, num+1):
		if (num-i) != 0:
			temp += Fraction(i,num-i)
	return round(temp,2);

print "==============================="
print "i/(n-i) where i is 0-n:"
print "n is 30"
print sumFractions(30)
print "n is 100"
print sumFractions(100)
print "n is 1245"
print sumFractions(1245)

