"""
Chris Mohr solution:
def sr(a):
    return (a * (a-1)) / 2
nums = list(map(int, open('7.in', 'r').readline().split(',')))
print(min(sum(fun(abs(num - i)) for num in nums) for i in range(max(nums))))
"""
with open("7.in", "r") as fh:
    lines = fh.readlines()
    pos = lines[0].split(",")
    mpos = 0
    for f in range(len(pos)):
        pos[f] = int(pos[f])
        if pos[f] > mpos:
            mpos = pos[f]
    print(pos)
    print(mpos)
    minf = 1000000000000
    mini = 0
    for i in range(mpos):
        f = 0
        for m in pos:
            x1 = abs(m - i)
            f += (x1 * (x1 + 1)) / 2
        if f < minf:
            minf = f
            mini = i
    print(f"min f: {minf} at pos: {mini}")
