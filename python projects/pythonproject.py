#!/user/bin/python
"""-------------------------------------
Daniel Dingess & Jared Aarons
Dr. Liu
Programming Languages 
April 26, 2016
Python Project
-------------------------------------"""
import glob, os
from Tkinter import *
from ttk import *
import tkMessageBox
from random import *
import random

file_name = ""
englishToSpanish = {}
spanishToEnglish = {}
file_list = []
lineCount = 0
score = 0

def selectDictionary():
	for f in os.listdir('.'):
		if f.endswith(".txt"):
			file_list.append(f)
	print file_list		

class QuizWindow(Frame):

	def __init__(self,parent):
		Frame.__init__(self,parent)
		self.parent = parent
		self.initUI()
	
	def initUI(self):
		#Window Set-up
		self.parent.title("Quiz Yourself")
		self.style = Style()
		self.style.theme_use("default")
		self.pack(fill=BOTH, expand=1)
	
		e = StringVar()
		s = StringVar()
		
		inputText= Entry(self, textvariable=e, state='readonly')
		inputText.pack()
		inputText.place(x=16,y=20)
		e.set("hello")
		
		
		outputText= Entry(self, textvariable=s)
		outputText.pack()
		outputText.place(x=16,y=40)
		
		checker = StringVar()
		checkbox = Entry(self, textvariable=checker,state='readonly')
		checkbox.place(x=16,y=90)
		
		scorevar = StringVar()
		scoreBox = Entry(self, textvariable= scorevar, state='readonly')
		scoreBox.place(x=16,y=110)
		scorevar.set(str(score));
		
		def newword():
			y = englishToSpanish[e.get()]
			
			checker.set("test")
		
			if s.get() == y:
				checker.set("Correct!")
				score = int(scorevar.get()) + 1
				scorevar.set(str(score))
				x = random.choice(list(englishToSpanish.keys()))
				y = englishToSpanish[x]
				e.set(x)
			else:
				checker.set("Incorrect!")
				msg = '''You incorrectly answered.Do you want to add this to another file for study focus?'''
				if tkMessageBox.askyesno("Sorry!", msg):		
					x = e.get()
					f2=open('studytranslations.txt','a')
					f2.write(x+" "+y)
					f2.close()
					x = random.choice(list(englishToSpanish.keys()))
					e.set(x)
				else:
					x = random.choice(list(englishToSpanish.keys()))
      				e.set(x)
      										
		check = Button(self, text="Check!", command=newword)
		check.place(x=58,y=61)
		
class MainWindow(Frame):
	def __init__(self,parent):
		Frame.__init__(self,parent)
		self.parent = parent
		self.initUI()
	
	def initUI(self):
		#Window Set-up
		self.parent.title("Menu")
		self.style = Style()
		self.style.theme_use("default")
		self.pack(fill=BOTH, expand=1)
		#dictionary setup
		
		f = open('translationdictionary.txt', 'r');
		lineCount = 0
		for line in f:
			temp = line.split()
			englishToSpanish[temp[0].lower()]= temp[1].lower()
			spanishToEnglish[temp[1].lower()]=temp[0].lower()
			lineCount = lineCount + 1
		'''
		print lineCount
		print englishToSpanish
		print spanishToEnglish
		'''
		def openQuiz():
			window = Toplevel(self.parent)
			window.geometry("200x165+300+300")
			app = QuizWindow(window)
			window.resizable(0,0)
			window.mainloop()
			
		#QuizButton
		quiz = Button(self, text="Quiz",command=openQuiz)
		quiz.place(x=20,y=20);
		
		#wordcount
		print "There are "+ str(lineCount) +" words in the dictionary."
		
		def showinfo():	
			tkMessageBox.showinfo("About the program", "This is a spanish vocabulary game. Press Quiz to start, type in your answers, and find out your score!")
		
		#about button
		about = Button(self, text ="About",command=showinfo)
		about.place(x=20, y=50)
		
		#Quit button
		quitButton = Button(self,text="Quit", command=self.quit)
		quitButton.place(x=20, y=80)
		
		
		
		
		
def selectDictionary():
	for f in os.listdir('.'):
		if f.endswith(".txt"):
			file_list.append(f)
	print file_list		

class SelectDictionaryWindow(Frame):

	def __init__(self,parent):
		Frame.__init__(self,parent)
		self.parent = parent
		self.initUI()
	
				
	def initUI(self):
		#Window Set-up
		self.parent.title("Select Dictionary")
		self.style = Style()
		self.style.theme_use("default")
		self.pack(fill=BOTH, expand=1)
		
		selectDictionary()
		
		dictionary_file = StringVar(self)
		dictionary_file.set(file_list[0]) #default
		w = OptionMenu(self, dictionary_file, *file_list)
		w.place(x=10, y=10)

		def openMain():
			file_name = dictionary_file
			window = Toplevel(self.parent)
			window.geometry("120x120+300+300")
			app = MainWindow(window)
			window.resizable(0,0)
			window.mainloop()
			
		startButton = Button(self, text ="Start",command=openMain)
		startButton.pack()
		startButton.place(x=60, y=40)
		
def main():
	window = Tk()
	window.geometry("200x80+300+300")
	app = SelectDictionaryWindow(window)
	window.resizable(0,0)
	window.mainloop()
		
if __name__ == "__main__":
	main()
		
