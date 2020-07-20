import os.path

c1filename = "/home/logbox/c1"
c2filename = "/home/logbox/c2"
c3filename = "/home/logbox/c3"

if(not os.path.isfile(c1filename)):
	print("C1:0 C2:0 C3:0")
	exit()

c1 = 0
with open(c1filename) as c1in:
	c1String = c1in.read().strip()
try:
	c1 = int(c1String)
except:
	pass

c2 = 0
with open(c2filename) as c2in:
	c2String = c2in.read().strip()
try:
	c2 = int(c2String)
except:
	pass

c3 = 0
with open(c3filename) as c3in:
	c3String = c3in.read().strip()
try:
	c3 = int(c3String)
except:
	pass

print("C1:%d C2:%d C3:%d" % (c1, c2, c3))
