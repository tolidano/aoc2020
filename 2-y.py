# yablonsky

from collections import namedtuple
import re

def test_passwords_new(policies):
    def count_chars(text, char, a, b):
        return (a < len(text) and text[a] == char) + (b < len(text) and text[b] == char)
    return sum(1 for p in policies if count_chars(p.p, p.c, p.a, p.b) == 1)

test_input = [re.split(r'-| |: ', row.rstrip()) for row in open('2.in')]
PassPolicy = namedtuple('PassPolicy', 'a b c p')
policies = [PassPolicy(int(policy[0]) - 1, int(policy[1]) - 1, *policy[2:]) for policy in test_input]
print(test_passwords_new(policies))
