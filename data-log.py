import serial
import time
import sys
import subprocess
import os

start = str(time.time())
fpath = "/home/logbox/serial/"
fmode = "a"

serialWait = 4

s = serial.Serial("/dev/serial0", 9600, timeout=3)

while serialWait > 0:
	s.flushInput()
	s.flush()
	s.flushOutput()
	serialWait = s.inWaiting()

sys.stdout.write("Waiting for HAT calibration signal")
init = ""

while init != "CAL":
	sys.stdout.write(".")
	sys.stdout.flush()
	init = s.readline().strip()
	time.sleep(1)

sys.stdout.write("\n")
sys.stdout.write("Calibration signal ready, sending data..")

latestData = subprocess.check_output(["python", "/home/logbox/os/get-latest-counters.py"])
s.write(latestData)
print(latestData.decode("utf-8"))

init = ""
while init != "CALOK":
	sys.stdout.write(".")
	sys.stdout.flush()
	init = s.readline().strip()
	time.sleep(1)

print(init)

buffer = ""

while True:
	t = time.time();
	print(t)

	while "\n\n\n" not in buffer:
		data = s.readline()
		if not data:
			continue

		if(data.startswith("C1")):
			c1 = data.split("\t", 1)[1]
			c1file = open("/home/logbox/c1", "w", 1)
			c1file.write(c1)
			c1file.flush()
			os.fsync(c1file)
			c1file.close()
		if(data.startswith("C2")):
			c2 = data.split("\t", 1)[1]
			c2file = open("/home/logbox/c2", "w", 1)
			c2file.write(c2)
			c2file.flush()
			os.fsync(c2file)
			c2file.close()
		if(data.startswith("C3")):
			c3 = data.split("\t", 1)[1]
			c3file = open("/home/logbox/c3", "w", 1)
			c3file.write(c3)
			c3file.flush()
			os.fsync(c3file)
			c3file.close()

		sys.stdout.write(data)
		buffer += data

	fname = fpath + str(t) + ".log"
	outf = open(fname, fmode)
	outf.write(buffer)
	outf.flush()
	outf.close()

	buffer = ""
