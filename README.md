# KV_Service_Engineering_Team_F_Task_2
This is the event management application made by Team F for KV Service Engineering of SS24

The repo should be cloned directly into the folder ```C:\xampp\htdocs```

## Setting up Keycloak
*Note*: This assumes that you've already created a user called "keycloak" in phpMyAdmin and granted it all privileges.

### Delete the keycloak database
1) Navigate to ```localhost/phpmyadmin```
2) Execute the SQL statement ```DROP DATABASE keycloak```
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/513b99a9-763c-4faa-9143-795ff83f2e32)

### Create the docker container
1) Pull the repo to update all files
2) Open PowerShell
3) Navigate to ```C:\xampp\htdocs\eventmgr``` in PowerShell
4) Ensure that Docker is running.
5) Delete the Docker container "Keycloak_Container".
6) Execute the command ```docker-compose up --detach``` in PowerShell
7) Close PowerShell
8) Wait for the container to start up. You can check the progress of keycloak starting up in Docker Desktop by clicking on the Container to view its logs. The container is ready when you can see the message ```WARN  [org.keycloak.quarkus.runtime.KeycloakMain] (main) Running the server in development mode. DO NOT use this configuration in production.```
![grafik](https://github.com/k12119624/eventmgr/assets/122382776/b143dc0d-1581-43a3-a7a5-b7bda528b0ee)
9) Once the container has finished starting up, see if you can access Keycloak on ```http://localhost:8081/admin```
10) If you can log into Keycloak using the username "_admin_" and the password "_admin_", everything should be fine.
11) There is no need for further configuration, as the demo-realm and demo_client have been imported automatically.
12) If the Keycloak configuration changes in the future, you may need to execute these steps again.
