import requests

payload={'slotid':'A1','status':1,'vechileno':'KL08A3454'}
r=requests.post('http://rentmycar16.esy.es/parkingslot.php',params=payload)
