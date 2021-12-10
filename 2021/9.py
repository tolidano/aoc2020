with open("9.in", "r") as fh:
    lines = fh.readlines()
    sumr = 0
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
                sumr += 1 + v
        lastline = line
        i += 1
    print(sumr)
