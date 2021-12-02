# yablonsky

from itertools import combinations

def two_sum(data, target):
    for a, b in combinations(data, 2):
        if a + b == target:
            return a * b

print(two_sum([int(row.strip()) for row in open('1.in')], 2020))

def three_sum(data, target):
    for a, b, c in combinations(data, 3):
        if a + b + c == target:
            return a * b * c

print(three_sum([int(row.strip()) for row in open('1.in')], 2020))
