# USAGE
# python3 recognize_video.py --detector face_detection_model \
# 	--embedding-model openface_nn4.small2.v1.t7 \
# 	--recognizer output/recognizer.pickle \
# 	--le output/le.pickle

from imutils.video import VideoStream
from imutils.video import FPS
from firebase.firebase import FirebaseApplication
from datetime import datetime
import numpy as np
import argparse
import imutils
import pickle
import time
import cv2
import os
import json
import urllib
import time
from pushbullet import Pushbullet
import sys

now = datetime.now()
timestampStr = now.strftime("%d/%m/%Y, %H:%M:%S")
# construct the argument parser and parse the arguments
ap = argparse.ArgumentParser()
ap.add_argument("-d", "--detector", required=True,
	help="path to OpenCV's deep learning face detector")
ap.add_argument("-m", "--embedding-model", required=True,
	help="path to OpenCV's deep learning face embedding model")
ap.add_argument("-r", "--recognizer", required=True,
	help="path to model trained to recognize faces")
ap.add_argument("-l", "--le", required=True,
	help="path to label encoder")
ap.add_argument("-c", "--confidence", type=float, default=0.5,
	help="minimum probability to filter weak detections")
args = vars(ap.parse_args())

# load the serialized face detector from disk
print("[INFO] Loading face detector...")
protoPath = os.path.sep.join([args["detector"], "deploy.prototxt"])
modelPath = os.path.sep.join([args["detector"],
	"res10_300x300_ssd_iter_140000.caffemodel"])
detector = cv2.dnn.readNetFromCaffe(protoPath, modelPath)

# load the serialized face embedding model from disk
print("[INFO] Loading face recognizer...")
embedder = cv2.dnn.readNetFromTorch(args["embedding_model"])

# load the actual face recognition model along with the label encoder
recognizer = pickle.loads(open(args["recognizer"], "rb").read())
le = pickle.loads(open(args["le"], "rb").read())

# initialize the video stream, then allow the camera sensor to warm up
print("[INFO] Starting video stream...")
vs = VideoStream(src=0).start()
time.sleep(2.0)

# start the FPS throughput estimator
fps = FPS().start()

# loop over frames from the video file stream
while True:
	# grab the frame from the threaded video stream
	frame = vs.read()

	# resize the frame to have a width of 600 pixels (while
	# maintaining the aspect ratio), and then grab the image
	# dimensions
	frame = imutils.resize(frame, width=800)
	(h, w) = frame.shape[:2]

	# construct a blob from the image
	imageBlob = cv2.dnn.blobFromImage(
		cv2.resize(frame, (300, 300)), 1.0, (300, 300),
		(104.0, 177.0, 123.0), swapRB=False, crop=False)

	# apply OpenCV's deep learning-based face detector to localize
	# faces in the input image
	detector.setInput(imageBlob)
	detections = detector.forward()

	# loop over the detections
	for i in range(0, detections.shape[2]):
		# extract the confidence (i.e., probability) associated with
		# the prediction
		confidence = detections[0, 0, i, 2]

		# filter out weak detections
		if confidence > args["confidence"]:
			# compute the (x, y)-coordinates of the bounding box for
			# the face
			box = detections[0, 0, i, 3:7] * np.array([w, h, w, h])
			(startX, startY, endX, endY) = box.astype("int")

			# extract the face ROI
			face = frame[startY:endY, startX:endX]
			(fH, fW) = face.shape[:2]

			# ensure the face width and height are sufficiently large
			if fW < 20 or fH < 20:
				continue

			# construct a blob for the face ROI, then pass the blob
			# through our face embedding model to obtain the 128-d
			# quantification of the face
			faceBlob = cv2.dnn.blobFromImage(face, 1.0 / 255,
				(96, 96), (0, 0, 0), swapRB=True, crop=False)
			embedder.setInput(faceBlob)
			vec = embedder.forward()

			# perform classification to recognize the face
			preds = recognizer.predict_proba(vec)[0]
			j = np.argmax(preds)
			proba = preds[j]
			name = le.classes_[j]

			# draw the bounding box of the face along with the
			# associated probability
			text = "{}: {:.2f}%".format(name, proba * 100)


			tempDetails = "https://temp-firebase-97add.firebaseio.com/"
			tempFirebase = FirebaseApplication(tempDetails, None)
			tempResult = tempFirebase.get("/IT01", None)

			url = "https://studentdetails-99fa7.firebaseio.com/"
			firebase = FirebaseApplication(url, None)
			result = firebase.get("/IT01", None)



			if name == "Yong Teng":
				for i in tempResult: #Check for entries captured by NFC
					if i == '0xcb28549225L':
						name = "Yong Teng"
						studentid = "S10198102"
						classdetails = "IT01"
						push = firebase.put("/IT01", "0xcb28549225L", {"Name": name, "StudentID": studentid, "Class": classdetails, "Time": timestampStr})
						pb = Pushbullet("o.nXnlSCCZsxJVypY8kDYmkpDdwDh52RsE")
						push = pb.push_note("Attendance have been taken", "At {}" .format(timestampStr))
						print("Yong Teng's Entry Pushed!")
					
					else:
						print("[INFO] Checking for RFID Entry.....")


			if name == "Wei Jie":
				for i in tempResult: #Check for entries captured by NFC		
					if i == '0xdb10109249L':
						name = "Wei Jie"
						studentid = "S10198155"
						classdetails = "IT01"
						push = firebase.put("/IT01", "0xdb10109249L", {"Name": name, "StudentID": studentid, "Class": classdetails, "Time": timestampStr}) #Push to result (StudentDetails)
						pb = Pushbullet("o.VNYqP5voadrJldi4nYkac54zZdUWmXmB")
						push = pb.push_note("Attendance have been taken", "At {}" .format(timestampStr))
						print("Wei Jie's Entry Pushed!")

					else:
						print("[INFO] Checking for RFID Entry.....")

		#{u'StudentID': u'S10198102', u'Name': u'YT'}
		# {'0x5b2e1192f6L': {'Name': 'RuiQuan', 'StudentID': 'S10194444'}, '0x5b564092dfL': {'Name': 'Jeya', 'StudentID': 'S10191111'}, 
		# '0x7b814f9227L': {'Name': 'HoeMan', 'StudentID': 'S10193333'}, '0xcb28549225L': {'Name': 'YT', 'StudentID': 'S10198102'}, 
		# '0xdb10109249L': {'Name': 'WeiJie', 'StudentID': 'S10198155'}, '0xfb941192ecL': {'Name': 'RuiLin', 'StudentID': 'S10192222'}}

			y = startY - 10 if startY - 10 > 10 else startY + 10
			cv2.rectangle(frame, (startX, startY), (endX, endY),
				(0, 0, 255), 2)
			cv2.putText(frame, text, (startX, y),
				cv2.FONT_HERSHEY_SIMPLEX, 0.45, (0, 0, 255), 2)		
		# print("[INFO] Checking for RFID Entry.....")
			
	# update the FPS counter
	fps.update()

	# show the output frame
	cv2.imshow("Frame", frame)
	key = cv2.waitKey(1) & 0xFF

	# if the `q` key was pressed, break from the loop
	if key == ord("q"):
		break
	
# stop the timer and display FPS information
fps.stop()
print("[INFO] elasped time: {:.2f}".format(fps.elapsed()))
print("[INFO] approx. FPS: {:.2f}".format(fps.fps()))

# do a bit of cleanup
cv2.destroyAllWindows()
vs.stop()