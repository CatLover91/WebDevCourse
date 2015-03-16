# Milestone 2
Nicholai Goodall

For Milestone 2, a major goal I wanted to accomplish was compartmentalization of web application processes. A major flaw of my Milestone 1 implementation was hard-coding a sole PHP script which handled a majority of the logic. This made code convoluted and difficult to debug. For this reason, the decision was made to transition over to an MVC framework. Implementation is still not finished, but all functional requirements have at the least a partial implementation.

## Laravel
Initially Meteor was chosen as the MVC framework of choice, but Laravel was chosen over it for the PHP and MySQL requirements of the class. While a majority of the framework files were modified based upon need of the application, there are four major sections of code that define my work on Milestone 2.

### Routing
Within `/app/Http/routes.php` lies the major movement behind the website. It contains all of the expected Http POST and GET statements, and what controller function is called upon receival. The Http POST functions are better described by the functions they call, but the GET requests define the major sections of the website:

    Route::get('/', 'HomeController@index');
    Route::get('question', 'QuestionController@showQuestion');
    Route::get('user/{user_id}/profile', 'UserController@showProfile');

Outside of the Login and Registration pages, the majority of the website lies within these three Routes. `HomeController@index` returns the apex-domain call of the website, and is the first thing the user sees. It lists the top questions at the website, which the user can use to move to other sections. Upon clicking a Question, `QuestionController@showQuestion` is called, showing the Answers along with more details about the Question. From any Question or Answer Object, listed underneat is the Avatar and Username of the poster. Once clicked, the `UserController@showProfile` is called, bringing up Profile Details, the Questions asked, and the possibility to add an Avatar.

### Views
Within `/resources/views/` lies Blade templating files that make up the website. `views/app.php` contains all of the Head material for the HTML along with the navbar, which purely functions as a social contact utility. `views/pages/` contains the templates called by the major GET statements, and `views/*.blade.php` along with `views/slider/` contain templates depending upon the Page templates. Implementation is mostly complete, all that is needed is `<a>` tags with hrefs on transition sections. The styling is partially complete, and is located `/resources/assets/app.less`.

### Controllers
Within `/app/Http/controllers/` lies the logic of the program. The controllers need the most work within the project. They are at 70% completion, with voting logic and avatar storage currently being implemented.

### Database
`milestone2dump.sql` contains my current SQL tables. Four tables are used, one for Questions, Answers, Users, and Votes. Votes is the newest table, and contains three columns. `user_id` contains the user who voted. `q_o_a` defines wether the user voted on a question or answer depending on the int value:

    0: Positive Quuestion Vote
    1: Negative Question Vote
    2: Positive Answer Vote
    3: Negative Answer Vote

Finally, `ref_id` contains the designated id of the Answer or Question.