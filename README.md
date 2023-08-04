<h3>My Movies db</h3>

<h2>App to track your watched and wishlisted movies</h2>

<p>First of all you need to make and configure .env file from .env.example. After this you can start server, do npm run dev and migrations</p>
<p>Also you need to do <b>php artisan storage:link</b> for images to be shown</p>
<p>For testing purposes you can use <b>php artisan db:seed</b> to fill your db with some data.</p>

## Roles:
There is two roles: Admin and regular user. Only admin add new movies. Also admin can use watched and wishlisted pages too.
