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
from bs4 import BeautifulSoup
import requests

now = datetime.datetime.now()
tomorrow = datetime.date.today() + datetime.timedelta(days=1)

PATH = "C:\Program Files (x86)\chromedriver.exe"
driver = webdriver.Chrome(PATH)

connection = mysql.connector.connect(host='127.0.0.1',
                                        port='3306',
                                        database='travelproject',
                                        user='root',
                                        password='')

mycursor = connection.cursor()

# mycursor.execute("TRUNCATE TABLE destinations")

mycursor.execute(f"SELECT state FROM covids")
myresult = mycursor.fetchall()

for st in myresult:

    state = st[0]

    driver.get(f"https://www.booking.com/searchresults.ms.html?ss={state}&checkin_year={now.year}&checkin_month={now.month}&checkin_monthday={now.day}&checkout_year={tomorrow.year}&checkout_month={tomorrow.month}&checkout_monthday={tomorrow.day}")

    json_element = driver.find_element_by_xpath("//*[@id='b2searchresultsPage']/script[48]")

    json_text = json_element.get_attribute('innerText')

    # print(json_text)
    json_data = json.loads(json_text)

    query_param = list(json_data['ROOT_QUERY'])[-1]

    # print(len(json_data['ROOT_QUERY'][query_param]['results']))


    for x in json_data['ROOT_QUERY'][query_param]['results']:
        # x is display data, y is extended data
        ref = x['basicPropertyData']['__ref']
        y = json_data[ref]

        destName = x['displayName']['text'].replace("'", "\\'")
        destPrice = int(x['priceDisplayInfo']['displayPrice']['amountPerStay']['amountRounded'].split()[1].replace(",", ""))
        descLink = f"https://booking.com/hotel/my/{y['pageName']}.ms.html"
        descRate = y['reviews']['totalScore']

        image = y['photos']['main']['highResUrl']['relativeUrl']
        descImage = f"https://cf.bstatic.com{image}"


        page = requests.get(descLink)
        soup = BeautifulSoup(page.content, 'html.parser')

        destDesc = soup.find("div", {"id": "property_description_content"}).text.replace("'", "\\'")

        # driver.execute_script(f'''window.open("{descLink}", "_blank");''')
        # driver.switch_to.window(driver.window_handles[-1])
        # destDesc = driver.find_element_by_id('property_description_content').text.replace("'", "\\'")
        # driver.close()
        # driver.switch_to.window(driver.window_handles[0])

        mycursor.execute(f"SELECT descLink FROM destinations WHERE descLink = '{descLink}'")
        # myresult = mycursor.fetchall()

        exist = mycursor.fetchone()

        if exist is None:
            mycursor.execute(f"INSERT INTO destinations (state, destname, destDesc, destPrice, descRate, descLink, descImage, created_at, updated_at) values ('{state}','{destName}','{destDesc}','{destPrice}','{descRate}','{descLink}','{descImage}','{now}','{now}')")
        else:
            mycursor.execute(f"UPDATE destinations SET state='{state}', destname='{destName}', destDesc='{destDesc}', destPrice='{destPrice}', descRate='{descRate}', descLink='{descLink}', descImage='{descImage}', created_at='{now}', updated_at='{now}' where descLink = '{descLink}'")


        connection.commit()


































