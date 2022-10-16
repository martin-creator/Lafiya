# Lafiya - your health matters!
> USSD-Based health education tool to nudge people towards wellness with patient-centred health content.
> Live demo [_here_](https://lafiya.primetel.tech/views/index.php). 

## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Usage](#usage)
* [Project Status](#project-status)
* [Room for Improvement](#room-for-improvement)
* [Acknowledgements](#acknowledgements)
* [Contact](#contact)



## General Information
### Backgound
Low digital health literacy remains a problem in Africa. It stands to reason that the most obvious approach to addressing low health literacy is making information more accessible. Without accessible information, there is no basis by which individuals or a community can process messages to improve health outcomes. With internet penetration at 51% in Nigeria and lower in some other African countries, there is a need to innovate around getting health messages across to communities without internet services and improving their health literacy.

### Proposed Solution
A USSD-Based mobile health educational tool that members subscribe to and select the types of messages they’d like to receive.


### Long-term solution
We hypothesise that if the proposed solution is successful, we could improve digital literacy access to the communities we serve.




## Technologies Used

### 1. Backend Dependencies
Our tech stack includes the following:
- PHP - version 5.0.5
- MYSQL - version 5.0.0
- Check the [Composer file](./composer.json) for other dependencies. You should be careful when changing any  dependency versions as this  can break the application. 

### 2. Frontend Dependencies
Our tech stack includes the following:
- Bootstrap -version 4.0.0
- Javascript-jquery
- HTML
- CSS

## Features
Ready features here:
- Users can subscribe and unsubcribe
- List FAQS
- Users can select type of messages to receive
- Admin dashboard to send messages to one or multiple users
- Admin dashboard with summary of keep metrics of business
- Admin registration and login


## Screenshots

![Imgur](/images/1.png)
![Imgur](/images/2.png)
![Imgur](/images/3.png)
![Imgur](/images/4.png)




## Setup

* This project is built on PHP 5 and MYSQL using the the XAMPP development environment. [Visit this link to download XAMMP](https://www.apachefriends.org/)
```
1 - Once you have installed XAMPP, please navigte to your program folders and select the XAMPP folder
2 - Inside the XAMMP folder select htdocs
3 - Open your terminal and git clone this repo in the htdocs directory (git clone https://****************************************)
4 - Move into the the newly cloned repo using the --cd-- command
5 - Inside your new directory run , --npm install--  to install any javascript dependencies
6 - Also, run the composer install to install any PHP libraries
7 - Then navigate to phpMyAdmin on your local machine  and create a new database called 'healthussd'
8 - Select the newly created database and import sql dump(link provide below)
9 - After this , head over to the xammp control and start Apacher and MySQL to run the application on yout local machine
10 - Visit http://localhost/Lafayi/views/index.php to access the application

```
* Download  [SQL dump ](./database/lafiya.sql)

### Testing the USSD Application

[Africa's talking API](https://africastalking.com/) is the aggregator that supports the application.  If you would like to test our USSD menu, head over  to [AT](https://africastalking.com/):
```
1 - Login into your account 
2 - Inside your acccount, navigate to the USSD section and create a new service code
3 - Use https://lafiya.primetel.tech/controllers/index.php as your callback
4 - Launch  the mobile phone simulator and see the magic!

```

* [Access the USSD menu to understand our workflow](https://drive.google.com/file/d/1j8zSddB81ISFrdrcg6Kj9eH4DmnFzNWr/view?usp=sharing)


## Usage
 Our application is built for the next billion users, people who don't have access to smartphones. We therefore hope that any person should find it easy to use. 



## Project Status
Project is: _in progress_ 


## Room for Improvement
Include areas you believe need improvement / could be improved. Also add TODOs for future development.

Room for improvement:
- Refactor source code to follow DRY and SOLID principles
- Write Tests for the application to ensure quality and support production environments
- Protect againts SQL injections and CORS attacks
- Make all web pages mobile responsive
- Redesign database to capture mDoc's needs 
- Improve documentaion in source code

To do:
- Content management for  the USSD menus
- Language translation for specific areas
- Voice support for differently abled people
- Mobile payments
- Diagnosis tools for people are not sure of what they are suffering from


## Acknowledgements
- This project was inspired and supported by [mDOC](https://www.mymdoc.com/)
- Many thanks to [Dr Kenga](https://ke.linkedin.com/in/derduskenga) whose knowledge in USSD development has enabled us to build the application


## Contact
Created by [@martin-creator, @moreenirungu, @paulbulibabuti, @princiaishimew, @fehile](martinlubowa@outlook.com) - feel free to contact us!




