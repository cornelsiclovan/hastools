install composer
install mysql 8
install php >= 7.2
clone project
cd <project directory>
run composer install
create a .env file and copy the .envmodel into it
edit .env user and password for mysql database connection
run bin\console doctrine:database:create
run bin\console doctrine:migrations:migrate
install symfony
from project directory run symfony server
project should run at http://localhost:8000
api available at http://localhost:8000/api
admin interface available at http://localhost:8000/admin
