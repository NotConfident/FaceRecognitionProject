#!/usr/bin/env python
# -*- coding: utf8 -*-

import RPi.GPIO as GPIO
import mfrc522 as MFRC522
import signal
import time
from firebase.firebase import FirebaseApplication
import random
from datetime import datetime

GPIO.setwarnings(False)
continue_reading = True

GPIO.cleanup()
url = "https://temp-firebase-97add.firebaseio.com/"
now = datetime.now()

timestampStr = now.strftime("%d-%b-%Y (%H:%M:%S)")
firebase = FirebaseApplication(url, None)

# Capture SIGINT for cleanup when the script is aborted
def end_read(signal,frame):
    global continue_reading
    print("Ctrl+C captured, ending read.")
    continue_reading = False        
    

# Hook the SIGINT
signal.signal(signal.SIGINT, end_read)

# Create an object of the class MFRC522
MIFAREReader = MFRC522.MFRC522()

# Welcome message
print("Capturing RFID CardID")
print("Press Ctrl-C to stop.")

def to_int(uid):
    value = 0

    for i in range(len(uid)):
        value = value * 256 + uid[i]
    return value
    
# This loop keeps checking for chips. If one is near it will get the UID and authenticate
while continue_reading:
    # Scan for cards    
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)
    
    # Get the UID of the card
    (status,uid) = MIFAREReader.MFRC522_Anticoll()
    uid_value = to_int(uid)


    if(hex(uid_value) == '0xcb28549225L'):
        name = 'YongTeng'
        studentid = 'S10198102'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")
        
    elif(hex(uid_value) == '0xdb10109249L'):
        name = 'WeiJie'
        studentid = 'S10198155'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")

    elif(hex(uid_value) == '0x5b564092dfL'):
        name = 'Jeya'
        studentid = 'S10191111'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")
        
    elif(hex(uid_value) == '0xfb941192ecL'):
        name = 'RuiLin'
        studentid = 'S10192222'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")

    elif(hex(uid_value) == '0x7b814f9227L'):
        name = 'HoeMan'
        studentid = 'S10193333'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")
       
    elif(hex(uid_value) == '0x5b2e1192f6L'):
        name = 'Zachary'
        studentid = 'S10194444'
        classno = 'IT01'
        result = firebase.put("/IT01", hex(uid_value),{"Name": name,"StudentID": studentid})
        print("Your card has been logged.")
    else:
        print("Unable to detect your student card. Please try again!")
            
    # If we have the UID, continue
    if status == MIFAREReader.MI_OK:
        print("Tag UID: {}".format(hex(uid_value)))
        time.sleep(1)
