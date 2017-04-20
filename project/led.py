import RPi.GPIO as gpio
import time

gpio.setmode(gpio.BCM)
gpio.setup(17,gpio.OUT)

gpio.output(17,True)
time.sleep(2)
gpio.output(17,False)
gpio.cleanup()
