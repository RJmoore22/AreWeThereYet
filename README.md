# AreWeThereYet
A website with SQL database capabilities
How to Setup And run the website and database.

  1.) Install MySQL Workbench: https://dev.mysql.com/downloads/workbench/
  2.) Make a Google Cloud Platform Account : https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwiW7-CG-Z73AhUjFdQBHa1GBngYABACGgJvYQ&ae=2&ohost=www.google.com&cid=CAASJeRo4kyJYKZw7NR1DI4qpvyU4ssK50g9W_JvRXz_Iu2LTVOa3kc&sig=AOD64_1-vgHvVkTcScZ9Q8mPMmlSXzC4Bw&ved=2ahUKEwjgi9mG-Z73AhVsAZ0JHW9XD1oQqyQoAHoECAMQBQ&dct=1&adurl=
  
        - Go to console -> navigation menu -> compute engine -> VM Instances, and create an instance.
        - Go to console -> navigation menu -> SQL, and create an instance. 
        - In GCP SQL go to connections -> Authorized networks -> add network. Add 2 authorized networks with your IP and the VM IP 
  3.) On mySQL Workbench create a local instence with the following log in credentials. 
  
         Server: (GCP SQL IP)
         Port: 3306
         Username: root
         Password: (GCP SQL instance password)
         
         - In MySQL, choose “File” -> “Open SQL Script...” and choose the SQL script that is available in the Github Repo.
         - Run the script to create the database.
  4.) Download the GitHub Repository and delete the sql script from that file. 
  5.) Go to the VM instance ssh terminal and type in the following command mysql --host(SQL IP) --user=root --(passowrd).
      Install apache -
                        sudo apt-get update
                        sudo apt-get install apache2
      Install php
                        sudo apt-get install php
                        
  6.) Go to the /var/www/html directory and upload all the files from the GitHub Repo except the sql script.
  
  7.) You can now view the website at http://(your VM IP)/index.php
