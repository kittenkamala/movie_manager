Movie Manager 
Simple desktop app to help manage movie data.

Getting Started:
Instructions below for getting the Movie Manager app running locally. 


Prerequisites:
-Git
-Terminal and command line
-Symfony installed in your local dev environment
        Download Symfony: https://symfony.com/download
-Composer installed in your local dev environment
        Install Composer: https://getcomposer.org/download/

Installing the App:

Step 1) Open a new terminal on your local machine
Step 2) In your terminal, clone the repository using the following command:
             `git clone https://github.com/kittenkamala/movie_manager.git`
Step 3) Navigate into the movie_manager repo in your local system and run the following command: 
            `symfony server:start`
Step 4) You'll receive a URL as output, click or copy/paste the URL in your browser to view the app. 

If you wish to use MAMP or another local IDE, you may edit the .env file to update database connection details. By default these are set to root:root port 3306. 

Play with it! 

To create a new default set of movie script data automatically: 

Navigate to /new_script_1 in your browser to auto-generate a new script with default values. This will redirect you to the /scripts_home page when done. 

To create a new movie: 
Navigate to /add to add data for a new movie script. All fields required. 

Fun things on /add: 
-Enter a real production company name (such as "Sony") and Movie Manager will generate 'Movies Per Year' and 'Percent Of Fails' data specific to that production company (based on production info from 2018). The companies Movie Manager recognizes are:  

'Netflix'
'Disney'
'Warner Bros'
'NBC'
'Sony'
'MGM'
'Lionsgate'
'DreamWorks'
 'Paramount'

-Paste part of a script text (or any text at all) into the 'body' field on /add, to find out:
 How many words are in the pasted text
 How many lines the text has
 How many times an actor's name is mentioned.


Built With:
Symfony - Web Framework
Composer - Dependency Management
FOSRestBundle- API routing
Doctrine/ORM - Database communication

Versioning
This is Movie Manager version 1.0.0 

Authors/Developers:
Amy Kamala Fiske 

Authors/Contributors: 
Robyn Battle

License: 

Movie Manager is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Movie Manager is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 

Acknowledgments:
Many thanks to Robyn Battle, Keith Koski and the staff at CBSinteractive! 