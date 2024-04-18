# KV_Service_Engineering_Team_F_Task_2
This is the event management application made by Team F for KV Service Engineering of SS24

The repo should be cloned directly into the folder C:\xampp\htdocs
***Setting up Keycloak***
*Note*: This assumes that you've already created a user called "keycloak" in phpMyAdmin and granted it all privileges. If the keycloak database already exists, you should delete it by executing the SQL statement ```DROP DATABASE keycloak```

1) Pull the repo to update all files
2) Open PowerShell
3) Navigate to ```C:\xampp\htdocs\eventmgr``` in PowerShell
4) Ensure that Docker is running.
5) Enter ```docker-compose up --detach``` in PowerShell
6) Close PowerShell
7) Wait for the container to start up. You can check the progress of keycloak starting up in Docker Desktop by clicking on the Container to view its logs
8) Once the container has finished starting up, see if you can access Keycloak on ```https://localhost:8081/admin```
9) If you can log into Keycloak using the username "_admin_" and the password "_admin_", everything should be fine.
10) There is no need for further configuration, as the demo-realm and demo_client have been imported automatically.
11) If the Keycloak configuration changes in the future, you may need to execute these steps again.
