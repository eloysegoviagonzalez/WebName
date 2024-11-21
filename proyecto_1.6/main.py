import os
from flask import Flask, render_template , request
from flask_cors import CORS

app = Flask(__name__)
CORS(app)
savedString = ""

@app.route('/yolo', methods=['POST'])
def yolo():
    ordinates   =  "<b>Yo soy el título de la historia</b>"
    stepson = {"ordinates":ordinates}
    return stepson

@app.route("/yolo/catcher", methods=["POST"])
def catcher():
    dataIntake = request.json
    print(dataIntake)
    savedString = dataIntake["stringIn"]
    print(savedString)
    return "potatoes"


"""
@app.route("/yolo/catcher", methods=["POST"])
def catcher():
    dictioOut = {"stringOut":savedString}

"""

if __name__ == '__main__':
    app.run()

