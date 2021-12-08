def get_bits(lines):
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
    return bits

with open("3.in", "r") as fh:
    lines = fh.readlines()

    oxy = lines
    obits = get_bits(lines)
    for i in range(len(obits.keys())):
        if obits[f"b{i}"]["0"] > obits[f"b{i}"]["1"]:
            greater = "0"
        else:
            greater = "1"
        oxy = [o.strip() for o in oxy if o[i] == greater]
        obits = get_bits(oxy)
        olen = len(oxy)
        if olen == 1:
            break

    co2 = lines
    cbits = get_bits(lines)
    for i in range(len(cbits.keys())):
        if cbits[f"b{i}"]["0"] <= cbits[f"b{i}"]["1"]:
            lesser = "0"
        else:
            lesser = "1"
        co2 = [c.strip() for c in co2 if c[i] == lesser]
        cbits = get_bits(co2)
        clen = len(co2)
        if clen == 1:
            break

    print(int(oxy[0], 2) * int(co2[0], 2))
