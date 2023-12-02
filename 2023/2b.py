s = 0
with open("i2") as r:
    l = r.readlines()
    for a in l:
        print(a)
        parts = a.strip().replace(": ", ":").split(":")
        print(parts)
        game = int(parts[0].replace("Game ", ""))
        print(game)
        pulls = parts[1].replace("; ", ";").split(";")
        print(pulls)
        valid = True
        min_r = 1
        min_g = 1
        min_b = 1
        for p in pulls:
            print(p)
            cubes = p.replace(", ", ",").split(",")
            print(cubes)
            for c in cubes:
                print(c)
                cp = c.split(" ")
                cnt = int(cp[0])
                print(cp)
                if cp[1] == "red" and cnt > min_r:
                    min_r = cnt
                elif cp[1] == "blue" and cnt > min_b:
                    min_b = cnt
                elif cp[1] == "green" and cnt > min_g:
                    min_g = cnt
        if valid:
            s += min_g * min_b * min_r
print(s)
