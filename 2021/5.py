import json

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
        if c1[0] != c2[0] and c1[1] != c2[1]:
            continue
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
        else:
            x = c1[0]
            start = c1[1] if c1[1] < c2[1] else c2[1]
            fin = c2[1] if c2[1] > c1[1] else c1[1]
            for m in range(start, fin + 1):
                if m not in grid:
                    grid[m] = {}
                if x not in grid[m]:
                    grid[m][x] = 0
                grid[m][x] += 1
    print(json.dumps(grid, indent=2))
    twos = 0
    for k1, v1 in grid.items():
        for k2, v2 in v1.items():
            if v2 > 1:
                twos += 1
    print(twos)

