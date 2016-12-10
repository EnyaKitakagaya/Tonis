#!/usr/bin/env python
# -*- coding: utf-8 -*

import os
import random
import re

from gspread import authorize
from oauth2client.service_account import ServiceAccountCredentials
from datetime import datetime as dt
import time

# class DayliyLog(object):
#     def __init__(self, card_number, direction):
#         # タイムスタンプ計算
#         self.time_stamp = ""
#         #
#         self.direction = direction
#         #
#         self.card_number = card_number
#
#     def as_row(self):
#         return [self.time_stamp, self.direction, self.card_number]


class FLKMenbershipRegistrationAccessor(object):
    def __init__(self):
        scope = ['https://spreadsheets.google.com/feeds']
        # https://docs.google.com/spreadsheets/d/1HX1yeQTqTKayIwpbdhxEF89LFPJ8k4cgmeyFVveNhnc/edit?usp=sharing
        doc_id = '1HX1yeQTqTKayIwpbdhxEF89LFPJ8k4cgmeyFVveNhnc'
        path = os.path.expanduser(".key/Tonis-0674cbe9d8cc.json")
        credentials = ServiceAccountCredentials.from_json_keyfile_name(path, scope)
        client = authorize(credentials)
        self.target_file = client.open_by_key(doc_id)

    def get_target_file(self):
        return self.target_file

    def get_worksheet(self, title):
        return self.target_file.worksheet(title)

    def add_entry_exti_log(self, card_number, direction):
        '''
        ユーザーの使用ログの更新
        **caution!!** データの反映までに3~4秒くらい時間がかかる
        **caution!!** データを一度ローカルにすべて持ってきて検索するので、計算量はO(n)
        :param card_number:
        :param direction:
        :return:
        '''
        time_stamp = dt.now()
        # 履歴を参照して当日中のデータがなければin存在しているのならばout
        worksheet = self.get_worksheet('entry-exitLog')
        str_date = time_stamp.strftime('%Y/%m/%d')
        # 検索セルのみ。レコード単位での検索ができないので、すべてのデータをローカルに一度持ってきて検索する必要がある
        date_criteria = re.compile(r''+str_date+'*')
        records_list = worksheet.get_all_records()
        today_record = filter(lambda record: date_criteria.match(record['time_stamp']), records_list)
        same_card = filter(lambda record: record['card_number'] == card_number, today_record)
        # TODO 登録状況を他のワークシートから取ってきて、検証 T/Fを返す
        if len(same_card) == 0:
            direction = 'in'
        else:
            direction = 'out'
        return worksheet.append_row([time_stamp.strftime('%Y/%m/%d %H:%M:%S '), str(direction), str(card_number)])


def main():
    print os.getcwd()
    flk_acc = FLKMenbershipRegistrationAccessor()

    random_card_num = hex(random.randint(0, pow(16, 8))) # 8byteの数字をランダムに生成
    flk_acc.add_entry_exti_log(random_card_num, "in")
    time.sleep(3.0)
    flk_acc.add_entry_exti_log(random_card_num, "in")

if __name__ == '__main__':
    main()
