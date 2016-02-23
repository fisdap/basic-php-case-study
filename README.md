# Fisdap Case Study

This is my implementation of the [case study](https://github.com/fisdap/basic-php-case-study) provided by [Fisdap](https://github.com/fisdap)

The project was made using Laravel 5.1 and Angular.js 1

For combining, minifying, and concatenating assets I used gulp as my task runner.

I changed the term 'List' into 'Series' because 'list' is a keyword in PHP.

Currently there is no test coverage.

This project includes a landing page in good spirit :)

There is a known issue when you have more than 3 series on a screen higher than bootstraps 'xs' that they start to jumble in the row.

## The Case Study

**Your task is to create a basic task manager (I know, I know, I'm sorry). The requirements are below. Our recommendation is to read through the whole list before you consider the architecture you wish to employ.**

 - [x] As a user, I should be able to create a task.
 - [x] As a user, I should be able to describe that task.
 - [x] As a user, I should be able to assign a state to the task (for instance, 'Open' and 'Completed' or 'To do,' 'Doing', and 'Done')
 - [x] As a user, I should be able to CHANGE the state of the task.
 - [x] As a developer, I should be able to read documentation about this project.
 - [x] As a user, I should be able to display any information related to tasks (and lists, if applicable). As a user, I should be able to delete a task.
 - [x] As a user, I should be able to create a list that can house tasks.
 - [x] As a user, I should be able to assign tasks to a list.
 - [ ] As a user, I should be able to assign tasks to MULTIPLE lists.
 - [x] As a user, I should have a basic frontend interface for this project.
 - [x] As a developer, I should be able to extend this project through RESTful API endpoints.
 - [ ] As a developer, I should be able to automatically generate API Endpoint documentation for this project when I modify it.
 - [ ] As a user, I should be able to generate a tweet every time I complete a task. As a user, I should be able to use twitter to change the state of a task.

## API Docs

**Auth**

    POST /api/v1/login

Takes an email and password as POST parameters. Returns an array of errors if something is incorrect. Set's the auth cookie upon success

    POST /api/v1/register

Takes an email and password as POST parameters. Returns an array of errors if something is incorrect. Set's the auth cookie upon success

**Series**

    GET /api/v1/series

Returns an array of all of your 'series' and their tasks in order of newest first

    POST /api/v1/series/new

Takes a name as a POST parameter. Must have laravels auth cookie as it grabs the currently authenticated user

Returns with an array of errors if fields are incorrect

    POST /api/v1/series/delete

Takes an ID of the series as a POST parameter. Returns HTTP 403 if you don't have permission (i.e it's another users series, not yours)

**Tasks**

    GET /api/v1/tasks

Returns an array of all of your 'tasks' and their series names, in order of newest first

    POST /api/v1/tasks/new

Takes a name, description, state, and series_id as POST parameters. Also requires user to be logged in

    POST /api/v1/tasks/delete


Takes an ID of the task as a POST parameter. Returns HTTP 403 if you don't have permission (i.e it's another users task, not yours)

    POST /api/v1/tasks/state

Takes an ID of the task and a new 'State' option as POST parameters
