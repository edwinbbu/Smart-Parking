import RPi.GPIO as gpio
from time import sleep
import sys

m1a = 16
m1b = 18
m1e = 22
 
m2a = 23
m2b = 21
m2e = 19

def init():
	gpio.setmode(gpio.BOARD)
	gpio.setup(m1a,gpio.OUT)
	gpio.setup(m1b,gpio.OUT)
	gpio.setup(m1e,gpio.OUT)
 
	gpio.setup(m2a,gpio.OUT)
	gpio.setup(m2b,gpio.OUT)
	gpio.setup(m2e,gpio.OUT)

def forward():
	print "Going forwards"
	gpio.output(m1a,gpio.HIGH)
	gpio.output(m1b,gpio.LOW)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.HIGH)
	gpio.output(m2b,gpio.LOW)
	gpio.output(m2e,gpio.HIGH)
	
	sleep(1)
	#gpio.cleanup()

def backward():
	print "Going backwards"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)
	#gpio.cleanup()


def right():
	print "Going right"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.HIGH)
	gpio.output(m2b,gpio.LOW)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)
	#gpio.cleanup()

def left():
	print "Going left"
	gpio.output(m1a,gpio.HIGH)
	gpio.output(m1b,gpio.LOW)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)
	#gpio.cleanup()

def stop():
	print "Stoping"
	gpio.output(m1e,gpio.LOW)
	gpio.output(m2e,gpio.LOW)
	gpio.cleanup()

while True:
	key=raw_input()
	init()
	#tf=0.030
	if key.lower()=='w':
		forward()
	elif key.lower()=='s':
		backward()
	elif key.lower()=='a':
		left()
	elif key.lower()=='d':
		right()
	elif key.lower()=='q':
		stop()
		print "Exiting"
		exit()
	else:
		stop()
		pass
