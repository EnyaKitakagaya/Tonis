#!/usr/bin/env python
# -*- coding: utf-8 -*-
# フェリカカードのIDを/tmp/nfcid に追記し続けるスクリプト by penkich 2016-10-15
# ubuntu をインストールした会員カード登録用ノートPCの /etc/rc.local に置いておき、自動起動させる。
# カード読み取りごとに、サウンドファイルを鳴らす（ラズパイならI/Oポートにブザーつないで鳴らすとよい）。
# サウンドファイルは、フリーのものが種々公開されてるので、利用するとよい。

import nfc
import re
import os

def connected(tag):
    # タグのIDなどを出力する
    #  print tag
    a = '%s' % tag
    id = re.findall("ID=([0-9A-F]*)",a)[0]
    file.write(id)

clf = nfc.ContactlessFrontend('usb')

while (True):
    with open("/tmp/nfcid", "a") as file:
        clf.connect(rdwr={'on-connect': connected})
        os.system("aplay /usr/local/bin/bell.wav") 
