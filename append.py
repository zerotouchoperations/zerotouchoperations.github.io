from flask import Flask, render_template,request

app=Flask(__name__)
@app.route('/'/ methods=['GET'.'POST'])
def home():
    if request.method=='POST':
        n=request.form['Email']
        n1=request.form['UserName']
        n2=request.form['UserId']
        return n
        return n1
        return n2
    return render_template('datacollection.html')
if __name__='__main__':
    app.run()
