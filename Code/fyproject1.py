# -*- coding: utf-8 -*-
"""
Created on Wed Feb 26 18:53:43 2020

@author: Sourav
"""

import pyfirmata
import mysql.connector

import time

print("<<<<<WELCOME TO LOAD MANAGING INTERFACE>>>>>>")
time.sleep(2)
board = pyfirmata.Arduino('COM5')
print("Arduino Successfully Connected....")
time.sleep(2)

board.digital[4].write(1)
board.digital[5].write(1)
board.digital[6].write(1)
board.digital[7].write(1)
board.digital[8].write(1)
board.digital[9].write(1)

mydb= mysql.connector.connect(host='localhost',user='root',password='123456',database='fyusers')
mycursor=mydb.cursor()
sql="SELECT totalP1,totalP2,totalP3,totalP4,totalP5,totalP6,cell_power FROM admindata"
mycursor.execute(sql)
result= mycursor.fetchall()
data=[]
totalconsum=0
for x in result[0]:
    data.append(x)  

for i in range(len(data)):
    print(data[i])
#    totalconsum=totalconsum+data[i]

print("LOAD DATA RETRIVED FROM DATABASE...")
time.sleep(3)
p1=data[0]
p2=data[1]
p3=data[2]
p4=data[3]
p5=data[4]
p6=data[5]
cell= data[6]

totalconsum= p1+p2+p3+p4+p5+p6

it = pyfirmata.util.Iterator(board)
it.start()

print("ENTER THE CURRENT GENERATION VALUE...")

analog_input = board.get_pin('a:0:i')
analog_value=0
for i in range(20):
    analog_value = analog_input.read()
    print(analog_value)
    time.sleep(1)    
total_gen= analog_value*55041

#total_gen=12000

sum=0
'''
if(totalconsum<total_gen):
    print("Total Actual Gen > Total Actual Load Consumption ")
    print("OPENING ALL PORTS......")
    board.digital[4].write(0)
    print("LOG: P1 Switch ON...")
    board.digital[5].write(0)
    print("LOG: P2 Switch ON...")
    board.digital[6].write(0)
    print("LOG: P3 Switch ON...")
    board.digital[7].write(0)
    print("LOG: P4 Switch ON...")
    board.digital[8].write(0)
    print("LOG: P5 Switch ON...")
    board.digital[9].write(0)
    print("LOG: P6 Switch ON...")
    
else:
    print("Total Actual Gen < Total Actual Load Consumption ")
    sum=p1
    if(sum<=total_gen):
        board.digital[4].write(0)
        print("LOG: P1 Switch ON...")
        time.sleep(2)
    sum=sum+p2
    if(sum<=total_gen):
        board.digital[5].write(0)
        print("LOG: P2 Switch ON...")
        time.sleep(2)
    sum=sum+p3
    if(sum<=total_gen):
        board.digital[6].write(0)
        print("LOG: P3 Switch ON...")
        time.sleep(2)
    sum=sum+p4
    if(sum<=total_gen):
        board.digital[7].write(0)
        print("LOG: P4 Switch ON...")
        time.sleep(2)
    sum=sum+p5
    if(sum<=total_gen):
        board.digital[8].write(0)
        print("LOG: P5 Switch ON...")
        time.sleep(2)
    sum=sum+p6
    if(sum<=total_gen):
        board.digital[9].write(0)
        print("LOG: P6 Switch ON...")
        time.sleep(2)
'''
print(" NOTE: ALL LOADS CONNECTED TO P1 WILL DRAW POWER FROM THE BATTERY STORAGE. ")
print("Current Battery Power status: ",cell)
print("Current P1 Load",p1)
print("Status of P1 loads: ")
if(cell > p1):
    board.digital[4].write(0)
    print("LOG: P1 Switch ON !!")
    time.sleep(2)
else:
    print("Battery has not sufficent charge to supply Critical Loads ! CHARGE NOW !!!!")
    print("LOG: P1 Switch OFF !!")
    time.sleep(2)

print(" NOTE: ALL OTHER LOADS WILL DRAW POWER FROM THE GRID !! ")
print("Total Actual Consumption is: ",totalconsum)
print("Total Actual Generation is: ",total_gen)
print("LOAD STATUS: ")
sum=p2
if(sum<=total_gen):
    board.digital[5].write(0)
    print("LOG: P2 Switch ON...")
    time.sleep(2)
sum=sum+p3
if(sum<=total_gen):
    board.digital[6].write(0)
    print("LOG: P3 Switch ON...")
    time.sleep(2)
sum=sum+p4
if(sum<=total_gen):
    board.digital[7].write(0)
    print("LOG: P4 Switch ON...")
    time.sleep(2)
sum=sum+p5
if(sum<=total_gen):
    board.digital[8].write(0)
    print("LOG: P5 Switch ON...")
    time.sleep(2)
sum=sum+p6
if(sum<=total_gen):
    board.digital[9].write(0)
    print("LOG: P6 Switch ON...")
    time.sleep(2)

        
print("ALL REQUIRED SWITCHES HAVE BEEN THROWN....")
print("Process Completed...")
board.exit()
