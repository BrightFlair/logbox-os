import serial
import time
import sys

start = str(time.time())
fpath = "/home/logbox/serial/"
fmode = "a"

serialWait = 4

s = serial.Serial("/dev/serial0", 9600, timeout=3)
#outf = open(fname, fmode)

while serialWait > 0:
	s.flushInput()
	s.flush()
	s.flushOutput()
	serialWait = s.inWaiting()

buffer = ""

while True:
	t = time.time();
	print(t)

	while "\n\n\n" not in buffer:
		data = s.readline()
		if not data:
			continue

		sys.stdout.write(data)
		buffer += data

	fname = fpath + str(t) + ".log"
	outf = open(fname, fmode)
	outf.write(buffer)
	outf.flush()
	outf.close()

	buffer = ""
