git clone https://github.com/Jayjace/laravelAndReactTableLeaveRequest.git
cd .\laravelAndReactTableLeaveRequest\
composer install 
cp .env.example .env 
go to .env file and put in your server username and password
php artisan key:generate 
php artisan migrate
php artisan db:seed
php artisan serve
on another terminal
cd .\react-datanova-requests\
npm install => (must have node installed)

npm run start


Laravel: 
App/http/Controllers/LeaveRequestController.php 
App/http/Requests/StoreLeaveRequestRequests.php : "just realized while making this that it is named requestRequest"
App/Models/LeaveRequest.php
database/factories/UserFactory.php
database/migrations/2024_07_21_102937_create_leave_requests_table
database/seeders/LeaveRequestSeeder.php
Public/images : holds the images of the project if you do not want to get it working locally
resources/css/app.css
resources/js/app.css
resources/views/welcome.blade.php
resources/views/leave_requests/index.blade.php
resources/views/leave_requests/edit.blade.php
resources/views/leave_requests/create.blade.php
Routes/api.php 
Routes/web.php
React:
react-datanova-requests/src/css/app.js
react-datanova-requests/components/LeaveRequests.css
react-datanova-requests/components/LeaveRequests.js
react-datanova-requests/src/css/app.css
react-datanova-requests/src/css/custom.css
