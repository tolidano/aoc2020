with open("2.in", "r") as fh:
    lines = fh.readlines()
    depth = 0
    forward = 0
    aim = 0
    for line in lines:
        parts = line.split()
        if "down" in parts[0]:
            aim += int(parts[1])
        elif "up" in parts[0]:
            aim -= int(parts[1])
        elif "forward" in parts[0]:
            forward += int(parts[1])
            depth += aim * int(parts[1])
    print(forward * depth)
