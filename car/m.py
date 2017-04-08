import RPi.GPIO as gpio
import time

gpio.setmode(gpio.BOARD)
gpio.setup(19,gpio.OUT)
gpio.setup(22,gpio.OUT)
gpio.output(19, gpio.LOW)
gpio.output(22, gpio.LOW)
gpio.cleanup()
 

