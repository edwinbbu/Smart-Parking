import urllib2
import json
url='http://rentmycar16.esy.es/polling.php'

req=urllib2.Request(url)
response=urllib2.urlopen(req)
page=response.read()
print page
obj=json.loads(page)
for key,value in obj.iteritems():
	print key,value

