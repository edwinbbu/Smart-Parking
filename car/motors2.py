import RPi.GPIO as gpio
import time

gpio.setmode(gpio.BOARD)

gpio.setup(23, gpio.OUT)
gpio.setup(21, gpio.OUT)
gpio.setup(19, gpio.OUT)


gpio.output(23, gpio.HIGH)
gpio.output(21, gpio.LOW)
gpio.output(19, gpio.HIGH)


time.sleep(50)
gpio.output(19, gpio.LOW)
gpio.cleanup()
 

