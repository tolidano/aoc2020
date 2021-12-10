with open("10.in", "r") as fh:
    lines = fh.readlines()
    pt = {')': 3, ']': 57, '}': 1197, '>': 25137}
    pair = {')': '(', ']': '[', '}':'{', '>':'<'}
    pts = 0
    for line in lines:
        q = []
        n = line.strip()
        for c in n:
            if c in [')', ']', '}', '>']:
                if not q:
                    pts += pt[c]
                    break
                else:
                    x = q.pop()
                    if x != pair[c]:
                        pts += pt[c]
                        break
            else:
                q.append(c)
    print(pts)
