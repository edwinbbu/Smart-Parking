import requests

payload={'checker':'A1','status':1,'vechileno':'KL08A3454'}
r=requests.post('http://rentmycar16.esy.es/test.php',params=payload)
