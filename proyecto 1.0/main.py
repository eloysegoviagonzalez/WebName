import os
from flask import Flask, render_template

app = Flask(__name__)



@app.route('/', methods=['GET', 'POST'])
def index():
    puntos=[(0,0),]
    a=0
    while a<5:
        puntos.append(((a+1)*2,0))
        a+=1
    objeto={"puntos":puntos}
    return objeto



if __name__ == '__main__':
    app.run()

