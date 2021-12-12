# 2400 too high
with open("11.in", "r") as fh:
    lines = fh.readlines()
    grid = {}
    flashes = 0
    for i, line in enumerate(lines):
        grid[i] = list(map(int, list(line.strip())))
    steps = 0
    print(f"..0123456789 {steps}\n" + "\n".join([str(k)+":"+"".join(list(map(str,j))) for k, j in grid.items()]) + "\n..0123456789\n")
    rows = len(lines)
    cols = len(lines[0].strip())
    while steps < 100:
        flashed = []
        to_flash = []
        for r, cs in grid.items():
            for c, v in enumerate(cs):
                grid[r][c] += 1
                if grid[r][c] > 9 and (r,c) not in flashed:
                    print(f"{r} and {c} need to flash, {grid[r][c]}")
                    to_flash.append((r,c))
        while to_flash:
            m = to_flash.pop()
            print(f"popping {m} from to_flash")
            flashes += 1
            if m in flashed:
                print(f"{m} already flashed this time")
                continue
            flashed.append(m)
            r = m[0]
            c = m[1]
            print(f"set {r} {c} to 0")
            grid[r][c] = 0
            if r > 0:
                print("not on the first row")
                if c > 0:
                    print("not on the first column")
                    grid[r-1][c-1] += 1
                    if grid[r-1][c-1] > 9:
                        print(f"{r}-1 and {c}-1 need to flash, {grid[r-1][c-1]}")
                        to_flash.append((r-1, c-1))
                grid[r-1][c] += 1
                if grid[r-1][c] > 9:
                    print(f"{r}-1 and {c} need to flash, {grid[r-1][c]}")
                    to_flash.append((r-1, c))
                if c < cols - 1:
                    print("not on the last column")
                    grid[r-1][c+1] += 1
                    if grid[r-1][c+1] > 9:
                        print(f"{r}-1 and {c}+1 need to flash, {grid[r-1][c+1]}")
                        to_flash.append((r-1, c+1))
            if c > 0:
                print("not on the first column")
                grid[r][c-1] += 1
                if grid[r][c-1] > 9:
                    print(f"{r} and {c}-1 need to flash, {grid[r][c-1]}")
                    to_flash.append((r, c-1))
            if c < cols - 1:
                print("not on the last column")
                grid[r][c+1] += 1
                if grid[r][c+1] > 9:
                    print(f"{r} and {c}+1 need to flash, {grid[r][c+1]}")
                    to_flash.append((r, c+1))
            if r < rows - 1:
                print("not on the last row")
                if c > 0:
                    print("not on the first column")
                    grid[r+1][c-1] += 1
                    if grid[r+1][c-1] > 9:
                        print(f"{r}+1 and {c}-1 need to flash, {grid[r+1][c-1]}")
                        to_flash.append((r+1, c-1))
                grid[r+1][c] += 1
                if grid[r+1][c] > 9:
                    print(f"{r}+1 and {c} need to flash, {grid[r+1][c]}")
                    to_flash.append((r+1, c))
                if c < cols - 1:
                    print("not on the last column")
                    grid[r+1][c+1] += 1
                    if grid[r+1][c+1] > 9:
                        print(f"{r}+1 and {c}+1 need to flash, {grid[r+1][c+1]}")
                        to_flash.append((r+1, c+1))
        for f in flashed:
            grid[f[0]][f[1]] = 0
        steps += 1
        print(f"..0123456789 {steps}\n" + "\n".join([str(k)+":"+"".join(list(map(str,j))) for k, j in grid.items()]) + "\n..0123456789\n")
    print(flashes)
