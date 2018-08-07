import serial
import time
import sys
import os

print("C1:1 C2:0 C3:0");
exit()
# This needs some attention. At the moment we're just returning 123 for c1,
# 0 for c2 and c3
# to prove that when the logbox reboots, we start counting from the
# provided value, rather than starting from 0.
#
# We probably need to store the latest counter values to their own
# files, rather than checking the serial directory, as it's very
# likely that the serial data directory becomes empty.

start = str(time.time())
serialPath = "/home/logbox/serial/"
latestFile = ""

for file in os.listdir(serialPath):
	if file > latestFile:
		latestFile = file

filePathName = serialPath + latestFile
print("Latest timestamp: {:s}".format(filePathName))

f = open(filePathName)
lines = [line.rstrip('\r\n') for line in f]

for l in lines:
	parts = l.split("\t")

	if not parts[0]:
		continue

	if parts[0][0] != "C":
		continue

	print("{:s}\t{:s}".format(parts[0], parts[1]))

exit()




fmode = "a"

serialWait = 4

s = serial.Serial("/dev/serial0", 9600, timeout=3)

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
