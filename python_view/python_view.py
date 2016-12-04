from flask import Flask, render_template
import numpy

app = Flask(__name__)


@app.route('/')
def hello_world():
    return 'Hello World!'

@app.route('/list')
def handle_list():
    num_list = numpy.arange(10)
    return render_template('list.html', message=num_list)


if __name__ == '__main__':
    app.debug = True
    app.host = "0.0.0.0:80"
    app.run()
