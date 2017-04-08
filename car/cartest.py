import RPi.GPIO as GPIO
import time
 
GPIO.setmode(GPIO.BOARD)
 
1a = 16
1b = 18
1e = 22
 
2a = 23
2b = 21
2e = 19
 
GPIO.setup(1a,GPIO.OUT)
GPIO.setup(1b,GPIO.OUT)
GPIO.setup(1c,GPIO.OUT)
 
GPIO.setup(2a,GPIO.OUT)
GPIO.setup(2b,GPIO.OUT)
GPIO.setup(2e,GPIO.OUT)
 
print "Going forwards"
GPIO.output(1a,GPIO.HIGH)
GPIO.output(1b,GPIO.LOW)
GPIO.output(1e,GPIO.HIGH)
 
GPIO.output(2a,GPIO.HIGH)
GPIO.output(2b,GPIO.LOW)
GPIO.output(2e,GPIO.HIGH)
 
time.sleep(3)
 
print "Going backwards"
GPIO.output(1a,GPIO.LOW)
GPIO.output(1b,GPIO.HIGH)
GPIO.output(1e,GPIO.HIGH)
 
GPIO.output(2a,GPIO.LOW)
GPIO.output(2b,GPIO.HIGH)
GPIO.output(2e,GPIO.HIGH)
 
time.sleep(3)

print "Going right"
GPIO.output(1a,GPIO.LOW)
GPIO.output(1b,GPIO.HIGH)
GPIO.output(1e,GPIO.HIGH)
 
GPIO.output(2a,GPIO.HIGH)
GPIO.output(2b,GPIO.LOW)
GPIO.output(2e,GPIO.HIGH)

time.sleep(3)

print "Going left"
GPIO.output(1a,GPIO.HIGH)
GPIO.output(1b,GPIO.LOW)
GPIO.output(1e,GPIO.HIGH)
 
GPIO.output(2a,GPIO.LOW)
GPIO.output(2b,GPIO.HIGH)
GPIO.output(2e,GPIO.HIGH)

time.sleep(3)
print "Now stop"
GPIO.output(1e,GPIO.LOW)
GPIO.output(2e,GPIO.LOW)
 
GPIO.cleanup()
