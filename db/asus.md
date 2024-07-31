# this is note for be
<!-- db object -->
***Online Food Ordering System ***
`Tables`
<!-- `Users`
    id (Primary Key)
    name
    phone_number
    email
    password
    address
    role -->

<!-- `Restaurants` 
    id (Primary Key)
    name
    address
    phone_number
    description
    image_url
    open_time
    close_time
    rating -->

<!-- `Categories`
    id (Primary Key)
    name -->

<!-- `Dishes`
    id (Primary Key)
    restaurant_id (Foreign key referencing Restaurants)
    name
    category_id (Foreign key referencing Categories)
    description
    price
    image_url
    status -->

<!-- `Combos`
    id (Primary Key)
    restaurant_id (Foreign key referencing Restaurants)
    name
    description
    price
    status
    image_url -->

<!-- `ComboDetails`
    id (Primary Key)
    combo_id (Foreign key referencing Combos)
    dish_id (Foreign key referencing Dishes)
    quantity -->

<!-- `Carts`
    id (Primary Key)
    user_id (Foreign key referencing Users)
    created_at -->



<!-- `CartDetails`
    id (Primary Key)
    cart_id (Foreign key referencing Carts)
    dish_id (Foreign key referencing Dishes)
    combo_id (Foreign key referencing Combos)
    quantity
    price -->



<!-- `Orders`
    id (Primary Key)
    user_id (Foreign key referencing Users)
    restaurant_id (Foreign key referencing Restaurants)
    total_amount
    payment_method
    status (e.g., pending, in_progress, delivered, canceled)
    created_at
    destination
  -->


`OrderDetails`
    id (Primary Key)
    order_id (Foreign key referencing Orders)
    dish_id (Foreign key referencing Dishes)
    combo_id (Foreign key referencing Combos)
    voucher_id (Foreign key referencing Vouchers)
    quantity
    price
    note

<!-- `Reviews`
    id (Primary Key)
    user_id (Foreign key referencing Users)
    dishes_id (Foreign key referencing Dishes)
    combos_id (Foreign key referencing Combos)
    rating
    comment
    created_at -->
  
<!-- - `Vouchers`
  - id (Primary Key)
  - code
  - discount
  - expiry_date
  - conditions
  - quantity
   -->

# how to create api
- make migration: `php artisan make:migration create_reviews_table`
  - define table structure in `db/migrations/date_time_create_table.php`
  - run migration: `php artisan migrate`
- create model: `php artisan make:model User`
  - define model (fillable, hidden, cast ...)
  - define relationships in model (belongs to, ...)
- create controller (to handling api reqs): `php aritsan make:controller UserController --api`
  - define api routes in `routes/api`
  - implement controller logic `http/controller/UserController.php`
- done 
- test api: `http://localhost:8000/api/users`