def find_paths(edges, nodes, prev, spec, spec_c):
    ret = []
    no = ["start", "end"]
    print(f"XXXXX {prev} - {spec} - {spec_c}")
    for m in edges[prev[len(prev)-1]]:
        if m == "start" and "start" in prev:
            continue
        if m == m.lower() and m not in no and m in prev:
            print(f"{m} is small and not in no and in prev")
            if spec is None:
                print("case 1")
                spec = m
                spec_c = 2
            elif spec != m:
                print("case 2")
                continue
            elif spec_c == 2:
                print("case 3")
                continue
            else:
                print("case 4 - DO NOT SEE THIS")
                spec_c = 2
        if m == "end":
            ret.append("-".join(prev) + "-end")
        else:
            new_p = prev + [m]
            print(f"calling again with {new_p} {spec} {spec_c}")
            ret.extend(find_paths(edges, nodes, prev + [m], spec, spec_c))
    return ret

with open("12.in", "r") as fh:
    edges = {}
    nodes = []
    for line in fh.readlines():
        """
    test = [
        "dc-end",
        "HN-start",
        "start-kj",
        "dc-start",
        "dc-HN",
        "LN-dc",
        "HN-end",
        "kj-sa",
        "kj-HN",
        "kj-dc",
        ]
    for line in test:
        """
        l,r = line.strip().split('-')
        if l not in nodes:
            nodes.append(l)
        if r not in nodes:
            nodes.append(r)
        if l in edges:
            if r not in edges[l]:
                edges[l].append(r)
        else:
            edges[l] = [r]
        if r in edges:
            if l not in edges[r]:
                edges[r].append(l)
        else:
            edges[r] = [l]
    print(edges)
    print(nodes)
    h = find_paths(edges, nodes, ["start"], None, 0)
    print("\n".join(h))
    print(len(h))
