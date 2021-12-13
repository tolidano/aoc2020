def find_paths(edges, nodes, prev):
    ret = []
    for m in edges[prev[len(prev)-1]]:
        if m == m.lower() and m in prev:
            continue
        if m == "end":
            ret.append("-".join(prev) + "-end")
        else:
            ret.extend(find_paths(edges, nodes, prev + [m]))
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
    h = find_paths(edges, nodes, ["start"])
    print(h)
    print(len(h))
