from collections import Counter

n = 0
with open("2.in", "r") as fh:
    lines = fh.readlines()
    for line in lines:
        f = 0
        p1 = line.split(":")
        pw = p1[1].strip()
        p2 = p1[0].split(" ")
        char = p2[1]
        lims = p2[0].split("-")
        minc = int(lims[0])
        maxc = int(lims[1])
        cnts = Counter(pw)
        if cnts[char] >= minc and cnts[char] <= maxc:
            n += 1
print(n)
