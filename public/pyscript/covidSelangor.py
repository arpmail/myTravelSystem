from typing import OrderedDict
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import mysql.connector
from mysql.connector import Error
import json
import datetime

now = datetime.datetime.now()
tomorrow = datetime.date.today() + datetime.timedelta(days=1)

PATH = "C:\Program Files (x86)\chromedriver.exe"
driver = webdriver.Chrome(PATH)

driver.get(f"https://covidnow.moh.gov.my/sgr/")

table = driver.find_element_by_xpath("//*[@id='vgt-table']")

rows = table.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")

columns = [
    'state',
    'deaths',
    'perMonth',
    'trend',
    'hospitalAdmission',
    'bedUtilise',
    'hospitalTrend',
    'cases',
    'per10k',
    'positiveRate',
    'positiveTrend',
    'fullyVaccinated',
]

datas = []

for row in rows:
    tds = row.find_elements_by_tag_name("td")

    i = 0
    data_state = {}
    for td in tds:
        data_state[columns[i]] = td.text

        if td.text == 'T\'gganu':
            data_state[columns[i]] = 'Terengganu'

        if td.text == 'Klang Vly.':
            data_state[columns[i]] = 'Klang Valley'

        if td.text == 'P. Pinang':
            data_state[columns[i]] = 'Pulau Pinang'

        if td.text == 'KL':
            data_state[columns[i]] = 'Kuala Lumpur'

        if td.text == 'N. Sembilan':
            data_state[columns[i]] = 'Negeri Sembilan'
            
        i += 1
    
    datas.append(data_state)
    

try:
    connection = mysql.connector.connect(host='127.0.0.1',
                                         port='3306',
                                         database='travelproject',
                                         user='root',
                                         password='')
    if connection.is_connected():
        table = 'covidnews'
        mycursor = connection.cursor()

        for d in datas:
            mycursor.execute(f"SELECT * FROM {table} WHERE state='{d['state']}'")
            myresult = mycursor.fetchone()
            date = datetime.datetime.now()
            print(myresult)
            print(d)
            if myresult == None:
                print(f"INSERT INTO {table} (state, deaths, perMonth, trend, hospitalAdmission, bedUtilise, hospitalTrend, cases, per10k, positiveRate, positiveTrend, fullyVaccinated, created_at, updated_at) values ('{d['state']}','{d['deaths']}','{d['perMonth']}','{d['trend']}','{d['hospitalAdmission']}','{d['bedUtilise']}','{d['hospitalTrend']}','{d['cases']}','{d['per10k']}','{d['positiveRate']}','{d['positiveTrend']}', '{d['fullyVaccinated']}','{date}','{date}')")
                mycursor.execute(f"INSERT INTO {table} (state, deaths, perMonth, trend, hospitalAdmission, bedUtilise, hospitalTrend, cases, per10k, positiveRate, positiveTrend, fullyVaccinated, created_at, updated_at) values ('{d['state']}','{d['deaths']}','{d['perMonth']}','{d['trend']}','{d['hospitalAdmission']}','{d['bedUtilise']}','{d['hospitalTrend']}','{d['cases']}','{d['per10k']}','{d['positiveRate']}','{d['positiveTrend']}', '{d['fullyVaccinated']}','{date}','{date}')")
                connection.commit()
            else:
                mycursor.execute(f"UPDATE {table} SET state='{d['state']}',deaths='{d['deaths']}',perMonth='{d['perMonth']}',trend='{d['trend']}',hospitalAdmission='{d['hospitalAdmission']}',bedUtilise='{d['bedUtilise']}',hospitalTrend='{d['hospitalTrend']}',cases='{d['cases']}',per10k='{d['per10k']}',positiveRate='{d['positiveRate']}',positiveTrend='{d['positiveTrend']}',fullyVaccinated='{d['fullyVaccinated']}',updated_at='{date}' WHERE state='{d['state']}' ")
                connection.commit()

except Error as e:
    print("Error while connecting to MySQL", e)

finally:
    if connection.is_connected():
        mycursor.close()
        connection.close()
        print("MySQL connection is closed")



































