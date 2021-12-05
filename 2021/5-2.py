with open("5.in", "r") as fh:
    lines = fh.readlines()
    grid = {}
    for line in lines:
        parts = line.split()
        c1 = parts[0].split(",")
        c2 = parts[2].split(",")
        c1[0] = int(c1[0])
        c1[1] = int(c1[1])
        c2[0] = int(c2[0])
        c2[1] = int(c2[1])
        if c1[1] == c2[1]:
            y = c1[1]
            if y not in grid:
                grid[y] = {}
            start = c1[0] if c1[0] < c2[0] else c2[0]
            fin = c2[0] if c2[0] > c1[0] else c1[0]
            for m in range(start, fin + 1):
                if m not in grid[y]:
                    grid[y][m] = 0
                grid[y][m] += 1
        elif c1[0] == c2[0]:
            x = c1[0]
            start = c1[1] if c1[1] < c2[1] else c2[1]
            fin = c2[1] if c2[1] > c1[1] else c1[1]
            for m in range(start, fin + 1):
                if m not in grid:
                    grid[m] = {}
                if x not in grid[m]:
                    grid[m][x] = 0
                grid[m][x] += 1
        else:
            startx = c1[0] if c1[0] < c2[0] else c2[0]
            finx = c2[0] if c2[0] > c1[0] else c1[0]
            starty = c1[1] if c1[0] < c2[0] else c2[1]
            finy = c2[1] if c2[0] > c1[0] else c1[1]
            m = startx
            n = starty
            chg_m = 0 if finx - startx == 0 else 1
            chg_n = 0 if abs(finy - starty) == 0 else 1
            while m <= finx:
                if n not in grid:
                    grid[n] = {}
                if m not in grid[n]:
                    grid[n][m] = 0
                grid[n][m] += 1
                m += 1
                if starty > finy:
                    n -= 1
                else:
                    n += 1
    twos = 0
    for k1, v1 in grid.items():
        for k2, v2 in v1.items():
            if v2 > 1:
                twos += 1
    print(twos)
