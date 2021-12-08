with open("8.in", "r") as fh:
    lines = fh.readlines()
    counts = {
        2: 1, # 2 letters is a 1
        4: 4,
        3: 7,
        7: 8,
            }
    app = 0
    for line in lines:
        p = line.split("|")
        s = p[1].split()
        for s1 in s:
            if len(s1) in counts.keys():
                app += 1
    print(app)
