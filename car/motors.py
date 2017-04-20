import RPi.GPIO as gpio
import time

gpio.setmode(gpio.BOARD)

gpio.setup(16, gpio.OUT)
gpio.setup(18, gpio.OUT)
gpio.setup(22, gpio.OUT)


gpio.output(16, gpio.LOW)
gpio.output(18, gpio.HIGH)
gpio.output(22, gpio.HIGH)


time.sleep(5)
gpio.output(22, gpio.LOW)
gpio.cleanup()
 

