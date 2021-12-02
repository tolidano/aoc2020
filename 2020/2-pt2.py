n = 0
with open("2.in", "r") as fh:
    lines = fh.readlines()
    for line in lines:
        f = 0
        p1 = line.split(":")
        pw = p1[1].strip()
        p2 = p1[0].split(" ")
        char = p2[1]
        pos = p2[0].split("-")
        pos1 = int(pos[0]) - 1
        pos2 = int(pos[1]) - 1
        if pw[pos1:pos1+1] == char:
            f = 1
        if pw[pos2:pos2+1] == char:
            if f == 1:
                continue
            n += 1
        if f == 1:
            n += 1
print(n)
