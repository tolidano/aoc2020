def bingo(nums, cards):
    for j in range(len(nums)):
        num = int(nums[j])
        for i, card in enumerate(cards):
            for k, line in enumerate(card):
                if num in line:
                    ind = cards[i][k].index(num)
                    cards[i][k] = [x if x != num else -1 for x in line]
                    check = [cards[i][b][ind] for b in range(5)]
                    if max(cards[i][k]) == -1 or max(check) == -1:
                        us = 0
                        for m in range(5):
                            for n in range(5):
                                if cards[i][m][n] > -1:
                                    us += cards[i][m][n]
                        print(us * num)
                        return

with open("4.in", "r") as fh:
    lines = fh.readlines()
    cards = []
    nums = lines[0].split(",")
    cn = 0
    for i in range(2, len(lines) - 4, 6):
        cards.append([])
        for j in range(5):
            y = lines[i+j].strip().split()
            x = list(map(int, y))
            cards[cn].append(x)
        cn += 1
    bingo(nums, cards)
