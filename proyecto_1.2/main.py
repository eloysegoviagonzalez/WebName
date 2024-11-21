import os
from flask import Flask, render_template

app = Flask(__name__)



@app.route('/', methods=['GET', 'POST'])
def index():
    points={}
    ordinates={}
    a=-5
    
    while(a<=5):
        b=a+1
        ordinates.append({a:b})
        a+=1
    stepson={"ordinates":ordinates}
    return stepson



if __name__ == '__main__':
    app.run()

