import RPi.GPIO as gpio
from time import sleep
import sys
import urllib2
import json
import requests

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
	
	sleep(3)

def backward():
	print "Going backwards"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)


def right():
	print "Going right"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.HIGH)
	gpio.output(m2b,gpio.LOW)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)

def left():
	print "Going left"
	gpio.output(m1a,gpio.HIGH)
	gpio.output(m1b,gpio.LOW)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(1)

def stop():
	print "Stoping"
	gpio.output(m1e,gpio.LOW)
	gpio.output(m2e,gpio.LOW)
	gpio.cleanup()

a=59

while(True):
	url='http://rentmycar16.esy.es/polling.php'
	sleep(2)
	req=urllib2.Request(url)
	response=urllib2.urlopen(req)
	page=response.read()
	#print page
	obj=json.loads(page)
	for key,value in obj.iteritems():
		if key=="transid":
			transid=value
	for key,value in obj.iteritems():
		if key=="count":
			c=value
			if c!=a:
				a=c
				init()
				forward()
				stop()
				init()
				left()
				stop()
				init()
				forward()
				stop()
				payload={'checker':transid}
				r=requests.post('http://rentmycar16.esy.es/checker.php',params=payload)
				sleep(1)
