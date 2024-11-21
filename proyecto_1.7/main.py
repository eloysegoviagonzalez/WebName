import os
from flask import Flask, render_template , request
from flask_cors import CORS
import json 

app = Flask(__name__)
CORS(app)
savedString = "potatoes"

@app.route('/main', methods=['POST'])
def yolo():
    ordinates   =  "<b>Yo soy el título de la historia</b>"
    stepson = {"ordinates":ordinates}
    return stepson

@app.route("/main/catcher", methods=["POST"])
def catcher():
    dataIntake = request.json
    print(dataIntake)
    savedString = dataIntake["stringIn"]
    print(savedString)
    return "potatoes"

@app.route("/main/sender", methods=["POST"])
def sender():
    dataOuttake = json.dumps({"stringOut":savedString})
    print(dataOuttake)
    return dataOuttake


"""
@app.route("/main/catcher", methods=["POST"])
def catcher():
    dictioOut = {"stringOut":savedString}

"""

if __name__ == '__main__':
    app.run()

