
<p align="center">
  <img src="/03 - ScreenShots/logo_bemidjibus.png" alt="alt text" width="500" height="250">
</p>

# Transport-Project
 This site is used to resolve the difficulties encountered by university students in choosing the bus and knowing the bus schedule and managing the payment process.

# Objectifs :
The traditional management of buses by the drivers consists in recording on a sheet the schedules of each student each day. So the goal of this project is to build a website using HTML, CSS, JS, and PHP that store and manage university bus schedule and payment methods.

# Structure :
This site is seen from two perspectives:
1. The driver (who has 1 or more buses).
2. The university student.

# Site features :
* Organize the method of payment, by card or direct (if direct payment must be confirmed by the driver), and determine the monthly or annual payment plan.
* Show the bus route on the map (outward and return) and locate the bus at defined times.
* Locate student homes on the map and display them for the driver to facilitate their collections.
* From the student collection: show each student the approximate time of the arrival of the bus.
* On return: display the bus rental for each student and display the return time.
* Collect student schedules (what time each student finishes) and divide them into groups (to organize the return schedule for students who finish early and late.
* The return time can be changed (if the student finishes early or if he finishes late) and notify the driver.
* Make a method that offers each driver to replace the students between them (ex: Two buses have highs that end very late instead of the two buses waiting they can replace the students between them in a way that only one bus waits.
* Make constraints on the bus (if he comes late or forgets a student we debit the amount to pay and at the same time if the student comes late we credit the amount to pay.
* Each new student must be associated with the most suitable bus.
* Group of students who finish at the same time to go on the same bus.
* Determination by the driver the amount paid for the students.

# The code :
The code is in this [Folder](05%20-%20Code).

# Notes:
This site is not fully finished it's just a prototype.

# Diagrams :
Here you can find different diagram of the project.
<details>
 <summary>Use case</summary>
 <p align="center">
  <img src="/03 - ScreenShots/Capture8.PNG" alt="alt text" height="400">
 </p>
</details>
<details>
 <summary>Activity diagram</summary>
 <p align="center">
  <img src="/03 - ScreenShots/activity_diagram.png" alt="alt text" height="400">
 </p>
</details>
<details>
 <summary>ER Model</summary>
 <p align="center">
  <img src="/03 - ScreenShots/Capture9.PNG" alt="alt text" height="400">
 </p>
</details>
<details>
 <summary>Physical data model</summary>
 <p align="center">
  <img src="/03 - ScreenShots/physical_data_model.png" alt="alt text" height="400">
 </p>
</details>
<details>
 <summary>Class diagram</summary>
 <p align="center">
  <img src="/03 - ScreenShots/Capture10.PNG" alt="alt text" height="400">
 </p>
</details>
<details>
 <summary>Sequence diagram</summary>
 <p align="center">
  <img src="/03 - ScreenShots/sequence_diagram.png" alt="alt text" height="400">
 </p>
</details>

# Application :
you could find a detailed explanation if you expand the Signin and Signup.
<details>
 <summary>Signin</summary>
 <p align="center">
  <img src="/03 - ScreenShots/sign_in.PNG" alt="alt text" width="250" height="300">
  <p align="center">If the user has already created an account, just log in by entering the Username and Password and the site takes care to recognize whether the account belongs to a student or a driver and then opens the profile.</p>
 </p>
</details>

<details>
    <summary>Signup</summary>
    <p align="center">
        <img src="/03 - ScreenShots/sign_in.PNG" alt="alt text" width="300" height="300">
        <img src="/03 - ScreenShots/choose.PNG" alt="alt text" width="300" height="300">
        <p align="center">If the user has not yet created an account, he must create it by pressing the little word Sign up? At the corner. Another page opens to choose the owner of the account if it is a <b>Student</b> or a <b>Driver</b>.</p>
        <ul>
            <li>
                <details>
                    <summary>Student</summary>
                    <p align="center">
                        <ol>
                            <li>
                                <details>
                                    <summary>Enter personal information</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">If he has chosen to register under a student account he must enter his personal information. He must first choose a User Name it is a unique word which identifies the user then enter his name First Name and the
                                            name of his family Last Name and enter a password Password then confirm it Confirm Password then he must enter the phone number Phone Number and finally i must choose a Location from the available options, then
                                            press the Next button.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Enter your program</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture5.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">After having filled in his personal information he must enter his weekly program (from what time to what time). Finally he presses OK.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Confirmation of registration</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture6.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">After entering their program, a Registration Confirmation page appears with the user's User Name. This page ensures that the registration process is complete. Finally, we press Go to your profile.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Student profile</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture7.PNG" alt="alt text" width="900" height="450">
                                        <p align="center">And finally the student's profile appears. On the right he sees his personal information and on the left he sees the map, and his program and the time of return and with which driver, and he can press change his program and press UPDATE to change it and he can press the photo of the profile to disconnect.</p>
                                    </p>
                                </details>
                            </li>
                        </ol>
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>Driver</summary>
                    <p align="center">
                        <ol>
                            <li>
                                <details>
                                    <summary>Enter personal information</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture1.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">If he has chosen to register under a driver account he must enter his personal information (STEP1). He must first choose a User Name it is a unique word which identifies the user then enter his name First Name and the name of his family Last Name and enter a password Password then confirm it Confirm Password then he must enter the phone number Phone Number and the Payment Mode (PER MONTH OR PER YEAR) and finally the Amount.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Enter bus information</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture2.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">After having filled in his personal information he must enter the information of the bus that he owns the NUMBER, MODEL and CAPACITY OF THE VEHICLE and the RENTAL where he wants to collect the students, he can add several locations by pressing the ADD button and each of the LOCATION will be added in the table below. Finally he presses OK.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Confirmation of registration</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture3.PNG" alt="alt text" width="400" height="400">
                                        <p align="center">After entering all the bus information a Registration Confirmation page appears with the user's User Name. This page ensures that the registration process is complete. Finally, we press Go to your profile.</p>
                                    </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Driver profile</summary>
                                    <p align="center">
                                        <img src="/03 - ScreenShots/Capture4.PNG" alt="alt text" width="900" height="450">
                                        <p align="center">And finally the driver's profile appears. On the right he sees his personal information and on the left he sees the card, and his program and the students register in his bus, and he can press the profile picture to disconnect.</p>
                                    </p>
                                </details>
                            </li>
                        </ol>
                    </p>
                </details>
            </li>
        </ul>
    </p>
</details>
