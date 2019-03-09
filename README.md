# Take Home Test - Sr. Backend Developer @ Internations

## Setup
------
1. Clone repository and move to folder
2. Copy `.env.example` to `.env` and fill database details
3. Run `composer install`
4. Set app key with `php artisan key:generate`
5. Set JWT key with `php artisan jwt:secret`
6. Migrate database `php artisan migrate --seed`
7. Run development server with `php artisan serve`

Now, you have a default admin:
**User:** admin@example.com
**Password:** secret


## API
------

By default entry point is `http://127.0.0.1:8000/api`

Login with `/auth/login` and use returned token as an **Authorization** header.
>Check line 30 in `\routes\api.php` to disable authentication.

Check the complete docs in [this postman collection](https://documenter.getpostman.com/view/3661251/S11Ppb1u)

Each entity has its methods in a standalone controller found in `app\Http\API` they contain validation, which in this test is just checking if a name parameter exists.

In the **group** controller special attention was made when deleting, the `destroy` methods validates if the group has users and returns an error. On the contrary **users** can be deleted anytime, if they belong to any group they will be detached first, this rule is enforced via the database with a `ON DELETE cascade` clause in the foreign key.

Also the cases when a user is added to a group but it already exists, and when a user is removed but it doesn't exist are validated in which case will return an error with a 409 response code.

## Web
------
You can login via web with the same admin credentials for a *very* basic, read-only browsing, it will show users, groups and its details.




By Jose Rafael Hernandez