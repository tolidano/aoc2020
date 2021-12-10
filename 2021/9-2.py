def calcbasin(lines, tup):
    seen = []
    to_see = [tup]
    while to_see:
        see = to_see.pop()
        seen.append(see)
        r = see[0]
        c = see[1]
        if r > 0 and int(lines[r-1][c]) < 9 and (r-1, c) not in seen:
            to_see.append((r-1, c))
        if r < len(lines) - 1 and int(lines[r+1][c]) < 9 and (r+1, c) not in seen:
            to_see.append((r+1, c))
        if c > 0 and int(lines[r][c-1]) < 9 and (r, c-1) not in seen:
            to_see.append((r, c-1))
        if c < len(lines[0]) - 2 and int(lines[r][c+1]) < 9 and (r, c+1) not in seen:
            to_see.append((r, c+1))
    return len(seen)

with open("9.in", "r") as fh:
    lines = fh.readlines()
    sumr = 0
    lp = []
    i = 0
    lastline = ""
    for line in lines:
        for j in range(len(line.strip())):
            r = 100
            l = 100
            u = 100
            d = 100
            v = int(line[j:j+1])
            if j > 0:
                l = int(line[j-1:j])
            if j < (len(line) - 2):
                r = int(line[j+1:j+2])
            if lastline:
                u = int(lastline[j:j+1])
            if i < len(lines) - 1:
                d = int(lines[i+1][j:j+1])
            if v < r and v < l and v < u and v < d:
                lp.append((i, j))
        lastline = line
        i += 1
    max1 = 0
    max2 = 0
    max3 = 0
    for l in lp:
        x = calcbasin(lines, l)
        print(f"X is {x} and maxes: {max1} {max2} {max3}")
        if x > max1:
            max1 = x
        elif x > max2:
            max2 = x
        elif x > max3:
            max3 = x
        print(f"X is {x} and maxes: {max1} {max2} {max3}")
    print(max1 * max2 * max3)
