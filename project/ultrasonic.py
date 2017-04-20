#Libraries
import RPi.GPIO as GPIO
import time
import requests

#GPIO Mode (BOARD / BCM)
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#set GPIO Pins
GPIO_TRIGGER = 18
GPIO_ECHO = 24

#set GPIO direction (IN / OUT)
GPIO.setup(GPIO_TRIGGER, GPIO.OUT)
GPIO.setup(GPIO_ECHO, GPIO.IN)
GPIO.setup(17,GPIO.OUT)
GPIO.setup(27,GPIO.OUT)
flag=-1;
def distance():
	# set Trigger to HIGH
	GPIO.output(GPIO_TRIGGER, True)

	# set Trigger after 0.01ms to LOW
	time.sleep(1)
	GPIO.output(GPIO_TRIGGER, False)

	StartTime = time.time()
	StopTime = time.time()

	# save StartTime
	while GPIO.input(GPIO_ECHO) == 0:
		StartTime = time.time()

	# save time of arrival
	while GPIO.input(GPIO_ECHO) == 1:
		StopTime = time.time()

	# time difference between start and arrival
	TimeElapsed = StopTime - StartTime
	# multiply with the sonic speed (34300 cm/s)
	# and divide by 2, because there and back
	distance = (TimeElapsed * 34300) / 2

	return distance

if __name__ == '__main__':
	try:
		while True:
			dist = distance()
			#print ("Measured Distance = %.1f cm" % dist)
			if dist>15:
				#print("Parking slot is vacant");
				if flag!=0:
					flag=0;
					payload={'slotid':'A1','status':0,'vechileno':'KL08A3454'}
					r=requests.post('http://rentmycar16.esy.es/parkingslot.php',params=payload)
				GPIO.output(27,False);
				GPIO.output(17,True);

			else:
				#print("Parking slot reserved");
				if flag!=1:
					flag=1;
					payload={'slotid':'A1','status':1,'vechileno':'KL08A3454'}
					r=requests.post('http://rentmycar16.esy.es/parkingslot.php',params=payload)
				GPIO.output(27,True);
				GPIO.output(17,False);
			time.sleep(1)

		# Reset by pressing CTRL + C
	except KeyboardInterrupt:
		#print("Measurement stopped by User")
		GPIO.cleanup()
