def get_bits(lines):
    bits = {}
    for line in lines:
        for i in range(len(line.strip())):
            if f"b{i}" not in bits:
                bits[f"b{i}"] = {"0": 0, "1": 0}
            bits[f"b{i}"][line[i]] += 1
    return bits

def get_one(lines, greater=True):
    oxy = lines
    obits = get_bits(lines)
    for i in range(len(obits.keys())):
        find = "1"
        if greater and obits[f"b{i}"]["0"] > obits[f"b{i}"]["1"] or \
            not greater and obits[f"b{i}"]["0"] <= obits[f"b{i}"]["1"]:
            find = "0"
        oxy = [o.strip() for o in oxy if o[i] == find]
        obits = get_bits(oxy)
        olen = len(oxy)
        if olen == 1:
            break
    return oxy

with open("3.in", "r") as fh:
    lines = fh.readlines()
    oxy = get_one(lines)
    co2 = get_one(lines, False)
    print(int(oxy[0], 2) * int(co2[0], 2))
