An ERP kind of project where major entities are:-
    - Users
    - User type
    - Department
    - Offices
    - Tasks

Solutions:-
    1. Create a migration for create all tables having minimal fields.
    2. Create a seeder file which will insert 3 user types (project manager, tech lead, Software engineer) in user type table and 15 entries in users table having 5 of each user type.
    3. Your user table should have parent child hierarchy (manager -> tech lead -> software engineer) make seeder to fulfill this requirement.
    4. Create a login , logout for the same for all users.
    5. Add Change password for each user.
    6. Each user can see all his information on dashboard, and assigned task on the dashboard
