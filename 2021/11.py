with open("11.in", "r") as fh:
    lines = fh.readlines()
    grid = {}
    for i, line in enumerate(lines):
        grid[i] = list(map(int, list(line.strip())))
    print(grid)
    steps = 0
    rows = len(lines)
    cols = len(lines[0].strip())
    while steps < 100:
        flashed = []
        to_flash = []
        for r, cs in grid.items():
            for c, v in enumerate(cs):
                grid[r][c] += 1
        for r, cs in grid.items():
            for c, v in enumerate(cs):
                if grid[r][c] > 9 and (r,c) not in flashed:
                    to_flash.append((r,c))
        while to_flash:
            m = to_flash.pop()
            if m in flashed:
                continue
            flashed.append(m)
            r = m[0]
            c = m[1]
            grid[r][c] = 0
            if r > 0:
                if c > 0:
                    grid[r-1][c-1] += 1
                    if grid[r-1][c-1] > 9:
                        to_flash.append((r-1, c-1))
                grid[r-1][c] += 1
                if grid[r-1][c] > 9:
                    to_flash.append((r-1, c))
                if c < cols - 1:
                    grid[r-1][c+1] += 1
                    if grid[r-1][c+1] > 9:
                        to_flash.append((r-1, c+1))
            if c > 0:
                grid[r][c-1] += 1
                if grid[r][c-1] > 9:
                    to_flash.append((r, c-1))
            if c < cols - 1:
                grid[r][c+1] += 1
                if grid[r][c+1] > 9:
                    to_flash.append((r, c+1))
            if r < rows - 1:
                if c > 0:
                    grid[r+1][c-1] += 1
                    if grid[r+1][c-1] > 9:
                        to_flash.append((r+1, c-1))
                grid[r+1][c] += 1
                if grid[r+1][c] > 9:
                    to_flash.append((r+1, c))
                if c < cols - 1:
                    grid[r+1][c+1] += 1
                    if grid[r+1][c+1] > 9:
                        to_flash.append((r+1, c+1))
        for j in flashed:
            grid[j[0]][j[1]] = 0
        print(grid)
        steps += 1
