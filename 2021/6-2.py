# stolen from Chris Mohr
from collections import Counter
counter = Counter(map(int, open('6.in', 'r').readline().split(',')))
print("A")
print(counter)
counts = [counter[k] for k in range(0, 9)]
print("B")
print(counts)
for day in range(256):
    print("counts")
    print(counts)
    print("1:")
    print(counts[1:])
    print(":1")
    print(counts[:1])
    new_counts = counts[1:] + counts[:1]
    print("NEW")
    print(new_counts)
    new_counts[6] += counts[0]
    print("NEW2")
    print(new_counts)
    counts = new_counts
print(sum(counts))
