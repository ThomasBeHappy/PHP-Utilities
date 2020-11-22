======= WELCOME =======
Heya! This library was made mainly for the students of Grafisch Lyceum Rotterdam. We noticed the school didn't really teach a lot. 
So here is a little library you can use in your projects to help you to be more efficient and improve your skills. 
We highly recommend you try and go through most of the code and try to figure out how it works. We tried to comment as much of it as we can and made it as detailed as possible.
Have fun using this and we are looking forward to seeing what you create!
We won't tell you how you need to set up your database so you will have to check through the files and see for yourself ;)
And as always, if you don't understand something, don't be hesitant to ask your teacher or contact Thomas and Calvin. Our contacts are down below under Author.
You can also join our discord down below!

======= INSTRUCTIONS =======

1. Place the classes folder in your project.
2. Place the autoload.php file in your PHP folder.
3. Open the autoload.php file and edit the path to the place where you places the classes folder.
4. Include/require the Autoload.php file in your php files that uses the library.
5. Enjoy using it! 

============================

====== CONFIGURATIONS ======

How to set up your database configurations

1. Open the Database.php file in the classes folder.
2. Edit the parameters $host, $username, $password, $database and $port to your database. You can leave port at 21 if you don't know this.
3. Enjoy using your database!


======= EXAMPLES =======

Example of a database connection

$conn = Database::connect();

Now you can use $conn just like you use it in your other projects.



Example of a select

$result = SQL::select("SELECT * FROM users");

if you are using a where in your SQL

$result = SQL::select("SELECT * FROM users WHERE id = ?", $id);

The ? in this statement stands for the place where you want your variable to go. Write your variables right after the querry.
This also does NOT require you to type Database::connect();
It does this for you



Example of a delete

SQL::idu("DELETE FROM users WHERE id = ?", $id);

IDU here stands for "Insert, Update and Delete" you use this you are doing one of these actions. 
It works the same as select but instead of giving back an array it will return either true or false depending on if it failed or succeeded,

=========================

======= AUTHORS =======

- Thomas van Otterloo | Discord: Gaming Frame#5727
- Calvin Tangeman | Discord: StinkyVoet#1303

Discord server: https://discord.gg/ZWspMWRVee 
=======================