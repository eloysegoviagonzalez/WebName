import os
from flask import Flask, render_template , request
from flask_cors import CORS
import json 
import psycopg2
from psycopg2 import Error

app = Flask(__name__)
CORS(app)
global cursor

connection = psycopg2.connect(user="postgres",password="1109",host="127.0.0.1",port="5432",database="String_keeper")
cursor = connection.cursor()

global savedPos 
global idset 

idset=[]

@app.route('/main', methods=['POST'])
def yolo():
    ordinates   =  "<b>Yo soy el título de la historia</b>"
    stepson = {"ordinates":ordinates}
    return stepson

@app.route("/main/catcher", methods=["POST"])
def catcher():
    global savedString
    dataIntake = request.json
    print(dataIntake)
    savedVector = dataIntake["stringIn"]
    idset = lister()
    savedPos = savedVector[0]
    savedString = savedVector[1]
    print(savedString)
    if savedPos != 0:   
        cursor.execute('DELETE FROM public."Strings" WHERE id='+str(savedPos)+' ',)
        connection.commit()
        Pos = savedPos
    else:
        if len(idset) == 0:
            Pos = 1
        else:
            Pos = (max(idset)+1)
    savedPos = Pos
    print(idset)
    cursor.execute('INSERT INTO public."Strings"(id, cream) VALUES ('+str(savedPos)+', \''+savedString+'\' ) ;')
    connection.commit()


    return "the menssage has been saved succesfully"

@app.route("/main/sender", methods=["POST"])
def sender():
    global savedString
    dataIntake = request.json
    print(dataIntake)
    savedNum =  dataIntake["ValueIn"]
    print(savedNum)
    cursor.execute('SELECT cream FROM public."Strings" WHERE id ='+str(savedNum)+';')
    savedString = cursor.fetchone()
    dataOuttake = json.dumps({"stringOut":savedString})
    print(dataOuttake)
    return dataOuttake

@app.route("/main/displayer", methods=["POST"])
def displayer():
    idset=lister()
    idset = [x for x in idset]
    print(idset)
    return idset


def lister():
    connection = psycopg2.connect(user="postgres",password="1109",host="127.0.0.1",port="5432",database="String_keeper")
    cursor = connection.cursor()
    idset_data=[]
    cursor.execute('SELECT "id" FROM public."Strings" ORDER BY "id" ASC ;')
    brute_set = cursor.fetchall()
    for dup in brute_set:
        idset_data.append(dup[0])
    return idset_data
"""
@app.route("/main/catcher", methods=["POST"])
def catcher():
    dictioOut = {"stringOut":savedString}

"""

if __name__ == '__main__':
    app.run()


