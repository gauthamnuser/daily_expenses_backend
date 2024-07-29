# daily_expenses_backend

# Database settings

DB_DATABASE=daily_expenses\
DB_USERNAME=root\
DB_PASSWORD=

run the command below to create appropriate tables for the application

```
php artisan migrate
```

# Calling API 

1:Create User

url: http://127.0.0.1:8000/createuser \
method:post\
keys: name,username,phone,email (values are string, username must be unique)

2:User Details

url: http://127.0.0.1:8000/user_details/username=value \
method:get\
key: username

3:Add Expense

url: http://127.0.0.1:8000/addexpense \
method:post\
keys: expense_id,type,total_expenses,user_id,exact

(type can be integers 1(equal), 2(exact), 3(percentage). multiple entries under the same expense_id will be added to the table)

4:User Expense

url: http://127.0.0.1:8000/user_expense/username=value \
method:get \
key: username 

(All the expenses of a specific user will be retrieved)

4:Overall Expense

url: http://127.0.0.1:8000/overall_expense/username=value
method:get
key: username

(Overall Expenses of a specific user will be retrieved)

5:Balance Sheet

url: http://127.0.0.1:8000/download_balancesheet
method:get

(Total number of expenses and the overall sum of the expenses will be shown)