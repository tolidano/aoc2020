import json
with open("13.in", "r") as fh:
    lines = fh.readlines()
    dots = {}
    folds = []
    for line in lines:
        if line.strip() and "fold" not in line:
            c = line.strip().split(",")
            x = c[0]
            y = c[1]
            if y not in dots:
                dots[y] = {}
            dots[y][x] = 1
        elif not line.strip():
            continue
        else:
            f = line.strip().split()[2].split("=")
            folds.append({"dir": f[0], "v": int(f[1])})
    while folds:
        fold = folds.pop()
        if fold["dir"] == "x": # vertical fold
            for k1, r in dots.items():
                for k2, v in r:
                    if k2 > fold[v]:
                        diff = k2 - fold[v]
                        dots[k1][fold[v] - diff] = 1
                        dots[k1][k2] = 0
        break # remove me for part 2?
    vis = 0
    for k1, r in dots.items():
        for k2, v in r.items():
            print(k1, k2)
            vis += v
    #vis = sum([sum(m) for k, m in dots.items()])
    print(vis)
