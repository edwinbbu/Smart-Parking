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

def forward(t):
	print "Going forwards"
	gpio.output(m1a,gpio.HIGH)
	gpio.output(m1b,gpio.LOW)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.HIGH)
	gpio.output(m2b,gpio.LOW)
	gpio.output(m2e,gpio.HIGH)
	
	sleep(t)

def backward(t):
	print "Going backwards"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(t)


def right(t):
	print "Going right"
	gpio.output(m1a,gpio.HIGH)
	gpio.output(m1b,gpio.LOW)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.LOW)
	gpio.output(m2b,gpio.HIGH)
	gpio.output(m2e,gpio.HIGH)
	sleep(t)

def left(t):
	print "Going left"
	gpio.output(m1a,gpio.LOW)
	gpio.output(m1b,gpio.HIGH)
	gpio.output(m1e,gpio.HIGH)
 
	gpio.output(m2a,gpio.HIGH)
	gpio.output(m2b,gpio.LOW)
	gpio.output(m2e,gpio.HIGH)
	sleep(t)

def stop():
	print "Stoping"
	gpio.output(m1e,gpio.LOW)
	gpio.output(m2e,gpio.LOW)
	gpio.cleanup()

url='http://rentmycar16.esy.es/polling.php'
req=urllib2.Request(url)
response=urllib2.urlopen(req)
page=response.read()
obj=json.loads(page)
for key,value in obj.iteritems():
	if key=="count":
		a=value


while(True):
	url='http://rentmycar16.esy.es/polling.php'
	sleep(2)
	req=urllib2.Request(url)
	response=urllib2.urlopen(req)
	page=response.read()
	print page
	obj=json.loads(page)
	for key,value in obj.iteritems():
		if key=="transid":
			transid=value
	for key,value in obj.iteritems():
		if key=="count":
			c=value
			if c!=a:
				a=c
				for key,value in obj.iteritems():
					if key=="slotid" and value=="A1":
						init()
						forward(6)
						stop()
						init()
						right(3.3)
						stop()
						init()
						forward(3)
						stop()
						sleep(1)
						payload={'checker':transid}
						r=requests.post('http://rentmycar16.esy.es/checker.php',params=payload)
						sleep(5)
						init()
						backward(3)
						stop()
						init()
						left(3)
						stop()
						init()
						backward(6)
						stop()
				for key,value in obj.iteritems():
					if key=="slotid" and value=="A2":
						init()
						forward(6)
						stop()
						init()
						left(3)
						stop()
						init()
						forward(3)
						stop()
						sleep(1)
						payload={'checker':transid}
						r=requests.post('http://rentmycar16.esy.es/checker.php',params=payload)
						sleep(5)
						init()
						backward(3.3)
						stop()
						init()
						right(3.3)
						stop()
						init()
						backward(6)
						stop()
