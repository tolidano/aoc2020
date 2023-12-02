red = 12
green = 13
blue = 14
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
        for p in pulls:
            print(p)
            cubes = p.replace(", ", ",").split(",")
            print(cubes)
            for c in cubes:
                print(c)
                cp = c.split(" ")
                cnt = int(cp[0])
                print(cp)
                if cp[1] == "red" and cnt > red:
                    valid = False
                elif cp[1] == "blue" and cnt > blue:
                    valid = False
                elif cp[1] == "green" and cnt > green:
                    valid = False
        if valid:
            s += game
print(s)
