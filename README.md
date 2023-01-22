
![Generic badge](https://img.shields.io/badge/STATUT-ARCHIVED-orange.svg)   ![Generic badge](https://img.shields.io/badge/VERSION-1.0-green.svg) ![Generic badge](https://img.shields.io/badge/SCHOOL_PROJET-Henallux-blue.svg)


# IESN - Projet Technique Web 

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
   <li>
      <a href="#tasks">Tasks</a>
      <ul>
      <li>
      <a href="#student">Student</a>
      </li>
            <li>
      <a href="#teacher">Teacher</a>
      </li>
      </ul>
    </li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#authors">Authors</a></li>
    <li><a href="#-build_with">Build with</a></li>
  </ol>
</details>


## About The Projet
Website allowing students to take online tests and teachers to retrieve the results.

## Tasks
### Student:
- [X] Registration
- [X] Login
- [X] Logout
- [X] When a student logs in, he/she will have access to the MCQ. 
- [X] He/she will have to choose among the different proposals, plus an "I don't know".
- [X] A button " finished " will allow to save the student's answers in the DB.
- [X] When a student has finished the assessment and logs in again with his login, his answer will be displayed.
- [X] Bonus: The student can choose from several quizzes (e.g. for different subjects)
- [ ] Bonus: In each session, the questionnaire of the concerned MCQ is randomly generated: 
    - [ ] Selection of 50% of the questions from the MCQ question pool.
    - [ ] Random order of the questions.
    - [ ] Random order of the proposed answers to the questions (with "I don't know" as the last proposal each time).
- [ ] Bonus : Add a time indicator with countdown.
- [ ] Bonus : Add a graph with results (http://www.highcharts.com/demo).
- [X] Bonus : Hasher passwords
- [X] Edit profile 

### Teacher:
- [X] Login
- [X] Log out
- [X] Students who have closed the exam (with their results)
- [X] Students who have not yet started
- [X] Students who are currently taking the assessment. 
- [X] If a student who has completed the assessment is selected, the details of their assessment will be displayed.
- [X] Edit Profile 
- [X] Add Exam 
- [X] Delete Exam
- [X] Add questions/answers
- [ ] Add questions/answers 
- [ ] Set an exam to a student
    
## Installation
1. Download repository.
2. Create database with *myExam.sql* file.
3. Edit *database.php* with your username, password and your name database. 
 ```php
	     $servername = "servername ";
		$username = "username";
		$password = "password";
   ```


## Authors
- [@LeigerMax](https://github.com/LeigerMax) 

## 🛠 Build with
- [Apache](https://httpd.apache.org/)
- [CSS](https://www.w3schools.com/css/)
- [MySQL](https://www.mysql.com/) 
- [PHP](https://www.php.net/)


