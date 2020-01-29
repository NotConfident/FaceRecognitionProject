import face_recognition
import cv2
import numpy as np
import os
import glob


video_capture = cv2.VideoCapture(0)

known_face_encodings = []
known_face_names = []
dirname = os.path.dirname(__file__)
path = os.path.join(dirname, 'known_people/')

list_of_files = [f for f in glob.glob(path+'*.png')]

number_files = len(list_of_files)

names = list_of_files.copy()

for i in range(number_files):
    globals()['image_{}'.format(i)] = face_recognition.load_image_file(list_of_files[i])
    globals()['image_encoding_{}'.format(i)] = face_recognition.face_encodings(globals()['image_{}'.format(i)])[0]
    known_face_encodings.append(globals()['image_encoding_{}'.format(i)])

    names[i] = names[i].replace("known_people/", "")  
    known_face_names.append(names[i])

face_locations = []
face_encodings = []
face_names = []
process_this_frame = True

while True:
    ret, frame = video_capture.read()

    small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)

    rgb_small_frame = small_frame[:, :, ::-1]

    if process_this_frame:
        face_locations = face_recognition.face_locations(rgb_small_frame)
        face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)

        face_names = []
        for face_encoding in face_encodings:
            matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
            name = "Unknown"

            face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
            best_match_index = np.argmin(face_distances)
            if matches[best_match_index]:
                name = known_face_names[best_match_index]

            face_names.append(name)

    process_this_frame = not process_this_frame


    for (top, right, bottom, left), name in zip(face_locations, face_names):
        top *= 4
        right *= 4
        bottom *= 4
        left *= 4

        cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)

        cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
        font = cv2.FONT_HERSHEY_DUPLEX
        cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)

    cv2.imshow('Camera', frame)

    # if cv2.waitKey(1) & 0xFF == ord('s'): 
    #     cv2.imwrite(filename='saved_img.jpg', img=frame)
    #     webcam.release()
    #     img_new = cv2.imread('saved_img.jpg', cv2.IMREAD_GRAYSCALE)
    #     img_new = cv2.imshow("Captured Image", img_new)
    #     cv2.waitKey(1650)
    #     cv2.destroyAllWindows()
    #     print("Processing image...")
    #     img_ = cv2.imread('saved_img.jpg', cv2.IMREAD_ANYCOLOR)
    #     print("Converting RGB image to grayscale...")
    #     gray = cv2.cvtColor(img_, cv2.COLOR_BGR2GRAY)
    #     print("Converted RGB image to grayscale...")
    #     print("Resizing image to 28x28 scale...")
    #     img_ = cv2.resize(gray,(28,28))
    #     print("Resized...")
    #     img_resized = cv2.imwrite(filename='saved_img-final.jpg', img=img_)
    #     print("Image saved!")
        

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

