# KV_Service_Engineering_Team_F_Task_2
This is the event management application made by Team F for KV Service Engineering of SS24

The repo should be cloned directly into the folder ```C:\xampp\htdocs```

## Setting up Keycloak
*Note*: This assumes that you've already created a user called "keycloak" in phpMyAdmin and granted it all privileges.

### Delete the keycloak database (if it already exists)
1) Navigate to [the phpMyAdmin SQL prompt](http://localhost/phpmyadmin/index.php?route=/server/sql)
2) Execute the SQL statement ```DROP DATABASE keycloak```
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/513b99a9-763c-4faa-9143-795ff83f2e32)

### Create the Docker container
1) Pull the repo to update all files
2) Open PowerShell
3) Navigate to ```C:\xampp\htdocs\eventmgr\setup``` in PowerShell
4) Ensure that Docker is running.
5) Delete the Docker container "Keycloak_Container".
6) Execute the command ```docker-compose up --detach``` in PowerShell
7) Close PowerShell
8) Wait for the container to start up. You can check the progress of keycloak starting up in Docker Desktop by clicking on the Container to view its logs. The container is ready when you can see the message ```WARN  [org.keycloak.quarkus.runtime.KeycloakMain] (main) Running the server in development mode. DO NOT use this configuration in production.```
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/b143dc0d-1581-43a3-a7a5-b7bda528b0ee)
9) Once the container has finished starting up, see if you can access Keycloak on [http://localhost:8081/admin](http://localhost:8081/admin)
10) If you can log into Keycloak using the username "_admin_" and the password "_admin_", everything should be fine.
11) There is no need for further configuration, as the demo-realm and demo_client have been imported automatically.
12) If the Keycloak configuration changes in the future, you may need to execute these steps again.

## Setting up the database
1) Navigate to [the phpMyAdmin SQL Prompt for our database](http://localhost/phpmyadmin/index.php?route=/database/sql&db=keycloak) (at the moment, we're just using the keycloak database, but ideally we would eventually move to our own).
2) Execute [the create table statement saved in _booking.sql_](https://github.com/k12119624/eventmgr/blob/main/setup/booking.sql) (ignore the error on line 4, as it appears to be a false alarm).
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/655b5f99-62f8-4444-b0bf-be7e9c9dc5fc)
3) *Optional:* If you would like to insert some test data, you can do so on [the appropriate page in phpMyAdmin](http://localhost/phpmyadmin/index.php?route=/table/change&db=keycloak&table=booking). You can even insert more than two rows at once by using increasing the number of insertions, using the control marked in green.
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/bd78da4e-8e5e-4a30-b091-81205684357b)
4) If something changes about our database in the future, you may need to execute these steps again.


