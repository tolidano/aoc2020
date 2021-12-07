# instead of dealing with each individual fish, you must
# consider all the fish on a particular day at once
# otherwise this gets exponentially longer, and after day 160,
# will take many years to compute
with open("6.in", "r") as fh:
    lines = fh.readlines()
    fish = lines[0].split(",")
    for f in range(len(fish)):
        fish[f] = int(fish[f])
    day = 0
    while day < 150:
        if day % 10 == 0:
            print(day)
        for i in range(len(fish)):
            fish[i] -= 1
            if fish[i] == -1:
                fish[i] = 6
                fish.append(8)
        day += 1
    print(len(fish))
