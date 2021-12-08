with open("8.in", "r") as fh:
    lines = fh.readlines()
    counts = {
        2: 1, # 2 letters is a 1
        4: 4,
        3: 7,
        7: 8,
            } # 2, 3, 5 use 5, 0, 6, 9 use 6
    out = 0
    for line in lines:
        seg = {"t": "", "m": "", "b": "", "tr": "", "tl": "", "br": "", "bl": ""}
        dig = {}
        p = line.split("|")
        nums = p[0].split()
        for num in nums:
            if len(num) in counts.keys():
                dig[counts[len(num)]] = num
        seven = dig[7]
        four = dig[4]
        for n in dig[1]:
            seven = seven.replace(n, "")
            four = four.replace(n, "")
        seg["t"] = seven
        print(seg)
        print(dig)
        break

        # tr is 1 (2 char, 2 choices)
        # br is 1 (2 char, 2 choices)
        # 2 and 3 have 4 in common, the unique in 2 is bl, the unique in 3 is br
        # 5 and 9 have 4 in common too, but 5 and 2 have only 3 (top mid bot)


        # b is used in 2, 3, 5, 6, 8
        # 3 is 5 (top, tr, br, mid, b) - mid and b are 2 choices if you subtract 7
        # 6 is 5 (tl, bl, mid, b, br) - top is missing
        # 9 is 4 + top


    print(out)
