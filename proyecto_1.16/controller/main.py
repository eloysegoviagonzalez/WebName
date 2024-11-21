import os
from flask import Flask, render_template , request
from flask_cors import CORS
import json 
import psycopg2
from psycopg2 import Error

app = Flask(__name__)
CORS(app)

connection = psycopg2.connect(user="postgres",password="1109",host="127.0.0.1",port="5432",database="String_keeper")
cursor = connection.cursor()

savedString = ""

@app.route('/main', methods=['POST'])
def yolo():
    ordinates   =  "<b>Yo soy el título de la historia</b>"
    stepson = {"ordinates":ordinates}
    return stepson

@app.route("/main/catcher", methods=["POST"])
def catcher():
    global savedString
    cursor.execute('DELETE FROM public."Strings" WHERE id=1;')
    connection.commit()
    dataIntake = request.json
    print(dataIntake)
    savedString = dataIntake["stringIn"]
    print(savedString)
    cursor.execute('INSERT INTO public."Strings"(id, cream) VALUES (1, \''+savedString+'\' ) ;')
    connection.commit()
    return "the menssage has been saved succesfully"

@app.route("/main/sender", methods=["POST"])
def sender():
    global savedString
    cursor.execute('SELECT cream FROM public."Strings" WHERE id=1 ;')
    savedString = cursor.fetchone()
    dataOuttake = json.dumps({"stringOut":savedString})
    print(dataOuttake)
    return dataOuttake

@app.route("/main/displayer", methods=["POST"])
def displayer():
    id_set=[1]
    cursor.execute('SELECT "id" FROM public."Strings" ORDER BY "id" ASC ;')
    brute_set = cursor.fetchall()
    for dup in brute_set:
        id_set.append(dup[0])
    print(id_set)
    return id_set


"""
@app.route("/main/catcher", methods=["POST"])
def catcher():
    dictioOut = {"stringOut":savedString}

"""

if __name__ == '__main__':
    app.run()


