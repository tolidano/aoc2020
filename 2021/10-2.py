with open("10.in", "r") as fh:
    lines = fh.readlines()
    pt = {')': 1, ']': 2, '}': 3, '>': 4}
    pair = {')': '(', ']': '[', '}':'{', '>':'<'}
    op = {v: k for k, v in pair.items()}
    scores = []
    for line in lines:
        q = []
        n = line.strip()
        print(n)
        good = True
        for c in n:
            if c in [')', ']', '}', '>']:
                if not q:
                    good = False
                    break
                else:
                    x = q.pop()
                    if x != pair[c]:
                        good = False
                        break
            else:
                q.append(c)
        if q and good:
            score = 0
            while q:
                score = score * 5 + pt[op[q.pop()]]
            if score:
                scores.append(score)
    middle = len(scores) // 2
    print(sorted(scores)[middle])
