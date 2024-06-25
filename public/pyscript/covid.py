from bs4 import BeautifulSoup
import requests
import mysql.connector
from mysql.connector import Error
import datetime

url = "https://www.outbreak.my/"
page = requests.get(url)

soup = BeautifulSoup(page.content, 'html.parser')

table = soup.find('table', class_='table table-states table-small table-hover')

db = []

for team in table.find_all('tbody'):
    rows = team.find_all('tr')
    for row in rows:
        newdb = {}
        state = row.find('td', class_='text-value').text.strip()
        if state!='Total':
            cases = row.find('small', class_='text-left').text.strip()
            death = row.find('td', class_='text-right text-value-black').text.strip()
            print(state,cases,death)
            newdb['state']=state
            newdb['cases']=cases
            newdb['death']=death

            db.append(newdb)

print(db)



try:
    connection = mysql.connector.connect(host='127.0.0.1',
                                         port='3306',
                                         database='travelproject',
                                         user='root',
                                         password='')
    if connection.is_connected():
        table = 'covids'
        mycursor = connection.cursor()

        for d in db:
            mycursor.execute(f"SELECT * FROM {table} WHERE state='{d['state']}'")
            myresult = mycursor.fetchone()
            date = datetime.datetime.now()
            print(myresult)
            if myresult == None:
                mycursor.execute(f"INSERT INTO {table} (state, cases, death, created_at, updated_at) values ('{d['state']}','{d['cases']}','{d['death']}','{date}','{date}')")
                connection.commit()
            else:
                mycursor.execute(f"UPDATE {table} SET cases='{d['cases']}', death='{d['death']}',updated_at='{date}' WHERE state='{d['state']}' ")
                connection.commit()

except Error as e:
    print("Error while connecting to MySQL", e)

finally:
    if connection.is_connected():
        mycursor.close()
        connection.close()
        print("MySQL connection is closed")

