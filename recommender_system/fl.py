import math

def euclideanDistance(instance1, instance2, length):
	distance = 0
	for x in range(length):
		distance += pow((instance1[x] - instance2[x]), 2)
	return math.sqrt(distance)

def most_common(lst):
    return max(set(lst), key=lst.count)

print "Enter 3 points seperated by white space"
num = raw_input().split()
num = [int(x) for x in num]

with open("dataset.txt") as textFile:
	lines = [line.lstrip("[").rstrip("]").rstrip("\n").split(',') for line in textFile]
length=lines.__len__()

print "Enter number of nighbours : "
n=input();

neighbour = [[89563245.0 for x in range(n)] for x in range(3)]
top = n - 1

print "Length of training set :"+ str(length)
for i in range(len(lines)):

	lines[i] = [int(numeric_string) for numeric_string in lines[i]]
	print lines[i]
	distance = euclideanDistance(num, lines[i], 3)
	clas=lines[i][3]
	point = i
	top = n - 1
	while ( distance <= neighbour[0][top] and top > -1 ):
		top=top-1
	top=top+1
	while(top < n):
		#swap element
		tempD = neighbour[0][top]
		tempC = neighbour[1][top]
		tempP = neighbour[2][top]
		neighbour[0][top] = distance
		neighbour[1][top] = clas
		neighbour[2][top] = point
		distance = tempD
		clas = tempC
		point = tempP
		top = top + 1
		
print "Belonging class : ",most_common(neighbour[1])
print "Neighbours : "
for i in range(len(neighbour[2])):
	print lines[ neighbour[2][i] ]
	
