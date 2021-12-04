def bingo(nums, cards):
    last_num = 0
    clen = len(cards)
    fin = 0
    for j in range(len(nums)):
        num = int(nums[j])
        for i, card in enumerate(cards):
            if cards[i]:
                a_last_card = cards[i]
                for k, line in enumerate(card):
                    if cards[i] and num in line:
                        ind = cards[i][k].index(num)
                        cards[i][k] = [x if x != num else -1 for x in line]
                        check = [cards[i][b][ind] for b in range(5)]
                        if max(cards[i][k]) == -1 or max(check) == -1:
                            last_num = num
                            last_card = cards[i]
                            cards[i] = 0
                            fin += 1
                            if fin == clen - 1:
                                break
    us = 0
    for m in range(5):
        for n in range(5):
            if last_card[m][n] > -1:
                us += last_card[m][n]
    print(us * last_num)
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
