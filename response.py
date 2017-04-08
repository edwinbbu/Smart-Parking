import urllib2

url='http://rentmycar16.esy.es/polling.php'

req=urllib2.Request(url)
response=urllib2.urlopen(req)
page=response.read()
print page