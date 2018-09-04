import os.path

c1filename = "/home/logbox/c1"
c2filename = "/home/logbox/c2"
c3filename = "/home/logbox/c3"

if(not os.path.isfile(c1filename)):
	print("C1:0 C2:0 C3:0")
	exit()
	
c1 = 0
with open(c1filename) as c1in:
	c1 = c1in.read().strip()
	
c2 = 0
with open(c2filename) as c2in:
	c2 = c2in.read().strip()
	
c3 = 0
with open(c3filename) as c3in:
	c3 = c3in.read().strip()
	
print("C1:" + c1 + " C2:" + c2 + " C3:" + c3)
