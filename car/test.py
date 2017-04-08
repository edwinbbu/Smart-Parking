import sys,pygame

#pygame.init()

while True:
	if(pygame.key.get_pressed()[pygame.K_w]!=0):
		print "w is pressed"
	else:
		print "other keys"
