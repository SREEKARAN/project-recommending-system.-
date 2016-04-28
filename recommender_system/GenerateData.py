from random import randint , sample
#currently no of features restricted to 3 fields to compact with knn algorithm
print " Enter number of clusters"
n=input()
print " Enter number of training sets "
m=input()
i=0
f = open('dataset.txt', 'w')
while ( i < m ) :
	train = sample(range(100), 3)
	train.append(randint(1,n))
	i=i+1
        str1 = ','.join(str(e) for e in train)
	f.write("%s\n" % str1)
f.close()
