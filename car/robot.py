import RPi.GPIO as gpio
import time

def init():
	gpio.setmode(gpio.BOARD)
	gpio.setup(7,gpio.OUT)
	gpio.setup(11, gpio.OUT)

def forward(tf):
	init()
	gpio.output(7, True)
	gpio.output(11, True)
	time.sleep(tf)
	gpio.cleanup()

def left(tf):
	init()
	gpio.output(7, False)
	gpio.output(11, True)
	time.sleep(tf)
	gpio.cleanup()

def right(tf):
	init()
	gpio.output(7, True)
	gpio.output(11, False)
	time.sleep(tf)
	gpio.cleanup()


forward(2)
