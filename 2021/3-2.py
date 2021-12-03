with open("3.in", "r") as fh:
    lines = fh.readlines()
    num = len(lines)
    bits = {}
    for line in lines:
        sline = line.strip()
        for i in range(len(sline)):
            if f"b{i}" not in bits:
                bits[f"b{i}"] = {}
            if "0" not in bits[f"b{i}"]:
                bits[f"b{i}"]["0"] = 0
            if "1" not in bits[f"b{i}"]:
                bits[f"b{i}"]["1"] = 0
            bits[f"b{i}"][sline[i]] += 1
    print(bits)

    oxy = lines
    co2 = lines

    for i in range(len(bits.keys())):
        if bits[f"b{i}"]["0"] > bits[f"b{i}"]["1"]:
            greater = "0"
            lesser = "1"
        else:
            greater = "1"
            lesser = "0"
        oxy = [o.strip() for o in oxy if o[i] == greater]
        olen = len(oxy)
        print(f"now oxy len is {olen}")
        if olen < 0:
            print(oxy)
        if olen == 1:
            break

    for i in range(len(bits.keys())):
        if bits[f"b{i}"]["0"] < bits[f"b{i}"]["1"]:
            greater = "1"
            lesser = "0"
        else:
            greater = "0"
            lesser = "1"
        co2 = [c.strip() for c in co2 if c[i] == lesser]
        clen = len(co2)
        print(f"now co2 len is {clen}")
        if clen < 0:
            print(co2)
        if clen == 1:
            break

    print(int(oxy[0], 2) * int(co2[0], 2))
