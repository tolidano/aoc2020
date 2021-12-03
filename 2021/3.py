with open("3.in", "r") as fh:
    lines = fh.readlines()
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
    epsilon = ""
    gamma = ""
    print(bits)
    print(bits.keys())
    for i in range(len(bits.keys())):
        print(bits[f"b{i}"])
        if bits[f"b{i}"]["0"] > bits[f"b{i}"]["1"]:
            print("more zeros!")
            gamma += "0"
            epsilon += "1"
        else:
            gamma += "1"
            epsilon += "0"
    print(gamma)
    print(epsilon)
    ie = int(epsilon, 2)
    ga = int(gamma, 2)
    print(ie * ga)

