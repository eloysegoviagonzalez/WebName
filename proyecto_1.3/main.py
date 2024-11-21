import os
from flask import Flask, render_template

app = Flask(__name__)



@app.route('/', methods=['GET', 'POST'])
def index():
    points={}
    ordinates="""<h1>Yo soy el título de la historia</h1>"""
    a=-5
    
    
    stepson={"ordinates":ordinates}
    return stepson



if __name__ == '__main__':
    app.run()

