# daily_expenses_backend

# Database settings

DB_DATABASE=daily_expenses\
DB_USERNAME=root\
DB_PASSWORD=\

run the command below to create appropriate tables for the application

```
php artisan migrate
```

# Calling API 

1:Create USER

url: http://127.0.0.1:8000/createuser
method:post
keys: name,username,phone,email (values are string, username must be unique)


