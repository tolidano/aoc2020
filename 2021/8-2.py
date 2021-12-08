with open("8.in", "r") as fh:
    lines = fh.readlines()
    counts = {
        2: 1, # 2 letters is a 1
        4: 4,
        3: 7,
        7: 8,
            } # 2, 3, 5 use 5, 0, 6, 9 use 6, the logic requires this setup
    # if we had a 6 and 9 with only 5 segments, the logic would change
    out = 0
    for line in lines:
        seg = {"t": "", "m": "", "b": "", "tr": "", "tl": "", "br": "", "bl": ""}
        dig = {}
        p = line.split("|")
        nums = p[0].split()
        for num in nums:
            if len(num) in counts.keys(): # unique counts
                dig[counts[len(num)]] = num
        seven = dig[7]
        four = dig[4]
        for n in dig[1]:
            seven = seven.replace(n, "") # take 1 out of 7 ...
        seg["t"] = seven # you have the top
        for num in nums:
            if len(num) == 6: # 0, 6, 9
                if dig[1][0] in num and dig[1][1] not in num: # 0 and 9 have 1 in them, but 6 only has half
                    dig[6] = num
                    seg["tr"] = dig[1][1]
                    seg["br"] = dig[1][0]
                if dig[1][0] not in num and dig[1][1] in num: # check the reverse
                    dig[6] = num
                    seg["tr"] = dig[1][0]
                    seg["br"] = dig[1][1]
        for num in nums:
            if len(num) == 5: # 2, 3, 5
                diff = [i for i in sorted(num) if i not in dig[6]]
                if not diff: # this is 5 (because it is contained within 6)
                    dig[5] = num
        seg["bl"] = [i for i in dig[6] if i not in dig[5]][0] # the missing piece is bottom left
        nine = sorted(dig[5] + seg["tr"]) # 9 is 5 and top right
        for num in nums:
            if sorted(num) == nine:
                dig[9] = num
        for num in nums:
            if len(num) == 6: # 6, 0, 9, but 6 and 9 are known
                if num != dig[6] and num != dig[9]:
                    dig[0] = num
            if len(num) == 5 and num != dig[5]: # 2, 3, 5
                if seg["br"] in num: # bottom right is in 3 not 2
                    dig[3] = num
                else:
                    dig[2] = num
        # this is not needed, really, but worth it for completeness
        seg["m"] = [i for i in sorted(dig[8]) if i not in dig[0]][0]
        seg["tl"] = dig[4].replace(seg["m"], "").replace(seg["tr"], "").replace(seg["br"], "")
        seg["b"] = dig[3].replace(seg["t"], "").replace(seg["tr"], "").replace(seg["m"], "").replace(seg["br"], "")
        for k, v in dig.items():
            dig[k] = sorted(v)
        put = p[1].split()
        th = 0
        for pu in put:
            for k, v in dig.items():
                if sorted(pu) == v:
                    th = 10 * th + k
        out += th
    print(out)
