install composer <br/>
install mysql 8 <br/>
install php >= 7.2 <br/>
clone project <br/>
cd <project directory> <br/>
run composer install <br/>
create a .env file and copy the .envmodel into it<br/>
edit .env user and password for mysql database connection <br/>
run bin\console doctrine:database:create <br/>
run bin\console doctrine:migrations:migrate <br/>
install symfony <br/>
from project directory run symfony server <br/>
project should run at http://localhost:8000 <br/>
api available at http://localhost:8000/api <br/>
admin interface available at http://localhost:8000/admin <br/>
