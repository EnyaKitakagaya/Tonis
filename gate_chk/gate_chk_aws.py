#!/usr/bin/env python
# -*- coding: utf-8 -*-

import loled 
import nfc
import spidev
import re
import mysql.connector
import time
import os

now = time.strftime("%Y-%m-%d %X",time.localtime())
hm = time.strftime("%X",time.localtime())[0:5]

def getid(tag):
    global id
    a = '%s' % tag
    id = re.findall("ID=([0-9A-F]*)",a)[0]
    os.system("aplay /home/pi/bell.wav &") 

con = mysql.connector.connect(user=‘XXXXXXXXXX’, password=‘XXXXXXXXX’, host=‘XXXXXXXXXX.rds.amazonaws.com', database='fablabkitakagaya', charset='utf8', ssl_ca='/home/pi/XXXXXXXXX.pem')

cursor = con.cursor()

##oled = loled.oled(0)

clf = nfc.ContactlessFrontend('usb')
while (True):
    oled = loled.oled(0)
    print "会員カードをかざして下さい。"
    clf.connect(rdwr={'on-connect': getid})
    sql = "select now() + interval +9 hour as now_jst"
    cursor.execute(sql)
    now_jst = cursor.fetchone()[0]
    cardid = id
    sql = "select userid,validity from card where cardid = '%s'" % cardid
    cursor.execute(sql)
    ans = cursor.fetchone()
    try:
        ans != None
        userid = ans[0]
        validity = ans[1]
        sql = "select penname from kaiin where userid = '%s'" % userid
        cursor.execute(sql)
        ans = cursor.fetchone()
        penname = ans[0]
        if (validity ==0):
            print "Not a valid card!!"
            oled.write_word("Not a valid card!!")
        else:
            print userid
            sql = "select start_at, end_at from riyou where userid = '%s' and end_at is NULL" % userid
            cursor.execute(sql)
            ans = cursor.fetchone()
            if (ans == None):
                print "Hello !"
                oled.write_word("Hello! ")
                oled.write_word(penname)
                sql = "insert into riyou(userid,start_at) values ('%s','%s')" % (userid, now_jst)
                cursor.execute(sql)
                con.commit()
            else:
                print "Bye !"
                oled.write_word("Bye! ")
                oled.write_word(penname)
                sql = "update riyou set end_at = '%s' where userid = '%s' and end_at is NULL" % (now_jst, userid)
                cursor.execute(sql)
                con.commit()
    except:
        print "Invalid card !!"
        oled.write_word("Invalid card !!")
        os.system("aplay /home/pi/horn.wav &") 
    time.sleep(2)
cursor.close()
con.close()
