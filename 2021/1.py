with open("1.in", "r") as fh:
    lines = fh.readlines()
    prev = 0
    lc = 0
    inc = 0
    for line in lines:
        if int(line) > prev and lc > 0:
            inc += 1
        lc += 1
        prev = int(line)
    print(inc)
