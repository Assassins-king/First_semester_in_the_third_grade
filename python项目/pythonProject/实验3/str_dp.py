# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 16:15
# @Author  : 崔文帅
# @File    : str_dp.py


def countSubstrings(s):

    dp = [[False] * len(s) for _ in range(len(s))]
    res = 0  # init result

    for i in range(len(s) - 1, -1, -1):
        for j in range(i, len(s)):
            if s[i] == s[j]:
                if j - i <= 1:
                    res += 1
                    dp[i][j] = True
                else:
                    if dp[i + 1][j - 1]:
                        res += 1
                        dp[i][j] = True

    return res
print(countSubstrings('aaa'))