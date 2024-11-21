import os
from flask import Flask, render_template
from flask_cors import CORS

app = Flask(__name__)
CORS(app)


@app.route('/yolo', methods=['POST'])
def yolo():
    ordinates="<b>Yo soy el título de la historia</b>"
    stepson={"ordinates":ordinates}
    return stepson



if __name__ == '__main__':
    app.run()

