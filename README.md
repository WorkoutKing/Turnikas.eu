<h1>Calisthenics page</h1>

<h2>Setting Up Project after cloning</h2>
<p>Laravel projects requires extra setups before it can run on your local computers.</p>
<p>
    First we will install Node Module and Vendor files:<br>
    <strong>npm i</strong><br>
    <strong>composer install</strong><br>
</p>

<h2>Setup .env file</h2>
<p>
To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env.
</p>

<h2>Setup Database</h2>
<p>On your .env file, locate this block of code below.
<b>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=subnetweb<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>
</b>
</p>

<h2>Final steps</h2>
<b></b>
npm run dev<br>
php artisan key:generate<br>
php artisan migrate <br>
php artisan db:seed <br>
</b>

<h2>To open project in the website you need to run:</h2><br>
<strong>php artisan serve</strong>

<h2>Login as admin:</h2><br>
<b>Email => admin@gmail.com,<br>
Password => 123456789</br>

<h3>And to see pictures if you make uploads you need create storage link:</h3><br>
php artisan storage:link<br>

<p><b>Project is in development!</b></p>
