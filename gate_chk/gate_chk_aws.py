#!/usr/bin/env python

# -*- coding: utf-8 -*-

import nfc
import spidev
import smbus
import re
import mysql.connector
import time

def getid(tag):
    global id
    a = '%s' % tag
    id = re.findall("ID=([0-9A-F]*)",a)[0]

con = mysql.connector.connect(user=‘xxxxxxxxxx', password=‘xxxxxxxxxx', host=‘xxxxxxxxxx-xxxxx-xxx.xxx.amazonaws.com', database='fablabkitakagaya', charset='utf8', ssl_ca='/home/pi/xxxxxxxxx.pem')
cursor = con.cursor()
clf = nfc.ContactlessFrontend('usb')

while (True):
    print "会員カードをかざして下さい。"
    clf.connect(rdwr={'on-connect': getid})
    sql = "select now()"
    cursor.execute(sql)
    now = cursor.fetchone()[0]
    cardid = id
    sql = "select userid,validity from card where cardid = '%s'" % cardid
    cursor.execute(sql)
    ans = cursor.fetchone()
    try:
        ans != None
        userid = ans[0]
        validity = ans[1]
        if (validity ==0):
            print "Not a valid card !!"
        else:
            print userid
            sql = "select start_at, end_at from riyou where userid = '%s' and end_at is NULL" % userid
            cursor.execute(sql)
            ans = cursor.fetchone()
            if (ans == None):
                print "Hello !"
                sql = "insert into riyou(userid,start_at) values ('%s','%s')" % (userid, now)
                cursor.execute(sql)
                con.commit()
            else:
                print "Bye !"
                sql = "update riyou set end_at = '%s' where userid = '%s' and end_at is NULL" % (now, userid)
                cursor.execute(sql)
                con.commit()
    except:
        print "Invalid card !!" 
    time.sleep(2)
cursor.close()
con.close()
