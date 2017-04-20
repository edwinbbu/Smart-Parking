import RPi.GPIO as gpio

gpio.setmode(gpio.BOARD)
gpio.setup(19,gpio.OUT)
gpio.setup(21,gpio.OUT)
gpio.setup(23,gpio.OUT)
gpio.setup(16,gpio.OUT)
gpio.setup(18,gpio.OUT)

gpio.setup(22,gpio.OUT)

gpio.output(16, gpio.LOW)
gpio.output(18, gpio.LOW)
gpio.output(19, gpio.LOW)
gpio.output(22, gpio.LOW)
gpio.output(21, gpio.LOW)
gpio.output(23, gpio.LOW)

gpio.cleanup()
 

