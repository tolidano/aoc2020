with open("1.in", "r") as fh:
    lines = fh.readlines()
    prev = 0
    inc = 0
    for i in range(len(lines) - 3):
        group = int(lines[i]) + int(lines[i+1]) + int(lines[i+2])
        print(lines[i:i+3])
        print(group)
        print(prev)
        if group > prev and i > 0:
            inc += 1
        prev = group
    print(inc)
