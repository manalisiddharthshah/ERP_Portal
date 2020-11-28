An ERP kind of project where major entities are:-
   - Users
   - User type
   - Department
   - Offices
   - Tasks

Solutions:-
   - Create a migration for create all tables having minimal fields.
   - Create a seeder file which will insert 3 user types (project manager, tech lead, Software engineer) in user type table and 15 entries in users table having 5 of each user type.
   - Your user table should have parent child hierarchy (manager -> tech lead -> software engineer) make seeder to fulfill this requirement.
   - Create a login , logout for the same for all users.
   - Add Change password for each user.
   - Each user can see all his information on dashboard, and assigned task on the dashboard
   
   (Load with:- localhost/login)
   
   Test account:-
    -Email Id:- manali@gmail.com
    -Password:- Manali@123
