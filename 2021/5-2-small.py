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
        startx = c1[0] if c1[0] < c2[0] else c2[0]
        finx = c2[0] if c2[0] > c1[0] else c1[0]
        starty = c1[1] if c1[0] < c2[0] else c2[1]
        finy = c2[1] if c2[0] > c1[0] else c1[1]
        m = startx
        n = starty
        chg_m = 0 if finx - startx == 0 else 1
        chg_n = 0 if abs(finy - starty) == 0 else 1
        print(line, startx, finx, starty, finy, chg_m, chg_n)
        while m <= finx and ((finy - starty > 0 and n <= finy) or (finy - starty < 0 and n >= starty)):
            if n not in grid:
                grid[n] = {}
            if m not in grid[n]:
                grid[n][m] = 0
            grid[n][m] += 1
            m += chg_m
            if starty > finy:
                n -= chg_n
            else:
                n += chg_n
    twos = 0
    for k1, v1 in grid.items():
        for k2, v2 in v1.items():
            if v2 > 1:
                twos += 1
    print(twos)
