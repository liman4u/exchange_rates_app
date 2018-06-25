# Exchange Rate App

A Simple exchange rate app using Fixer API

# To run locally

 - Git clone this repository
 - Change directory into root of cloned folder
 - Enter `composer install` (assuming you have `composer` and its related packages installed and or configured)
 - Rename `.env.example`  to `.env` (This contains the app configs , with FIXER URL and API_KEY, the api key is from my account and will expire on 01/07/2018, 
 use a different key from Fixer if required)
 - Enter `php artisan serve`
 - Open localhost:8000 or 127.0.0.1:8000 to view app
 
# Screenshots
#### Home Page
![Image](screenshots/1.png?raw=true "HomePage")

#### Rate Page
![Image](screenshots/2.png?raw=true "Rate Page")

#### Error : Required Input
![Image](screenshots/3.png?raw=true "Error : Required Input")

#### Error : Rate Not Received
![Image](screenshots/4.png?raw=true "Error : Rate Not Received")