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
        for c in n:
            if c in [')', ']', '}', '>']:
                if not q:
                    break
                else:
                    x = q.pop()
                    if x != pair[c]:
                        break
            else:
                q.append(c)
        if q:
            score = 0
            while q:
                score = score * 5 + pt[op[q.pop()]]
            if score:
                scores.append(score)
    print(sorted(scores))
    print(len(scores))
