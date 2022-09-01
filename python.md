# 第一讲

## 初识python

```python
The Zen of Python, by Tim Peters

Beautiful is better than ugly.
Explicit is better than implicit.
Simple is better than complex.
Complex is better than complicated.
Flat is better than nested.
Sparse is better than dense.
Readability counts.
Special cases aren't special enough to break the rules.
Although practicality beats purity.
Errors should never pass silently.
Unless explicitly silenced.
In the face of ambiguity, refuse the temptation to guess.
There should be one-- and preferably only one --obvious way to do it.
Although that way may not be obvious at first unless you're Dutch.
Now is better than never.
Although never is often better than *right* now.
If the implementation is hard to explain, it's a bad idea.
If the implementation is easy to explain, it may be a good idea.
Namespaces are one honking great idea -- let's do more of those!

```

解释语言

解释器由c语言实现

## `eval()`函数

计算字符串所对应的表达式的值

```python
str1='10'
str2='20.1'

print(eval(str1))
print(type(eval(str1)))

print(eval(str2))
print(type(eval(str2)))

print(eval(input("   ")))
```

```
10
<class 'int'>
20.1
<class 'float'>
   3+2
5
```



