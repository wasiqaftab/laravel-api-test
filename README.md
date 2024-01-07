
# Quote App

A Laravel application to get random Kanye Quotes


## Installation

PHP 8.2 or greater.

Copy env example file and modify environmet variables
```bash
  cp .env.example .env
```
Install all required packages
```bash
  composer install
```

Serve the project

```bash
  php artisan serve
```


## Documentation

### Auth Api


### Registration:
```
/api/register
```

**Request Parameters:**
- `email` (required, string): User's email address.
- `password` (required, string): User's password (min length: 8 characters).

**Example Request:**
```bash
curl -X POST -H "Content-Type: application/json" -d '{"email":"example@example.com","password":"yourpassword"}' http://your-app-url/api/register
```
**Example Response:**
```bash
{
  "token": "generated_api_token"
}

```


### Login:
```
/api/login
```

**Request Parameters:**
-  `email` (required, string): User's email address.
- `password` (required, string): User's password (min length: 8 characters).

**Example Request:**
```bash
curl -X POST -H "Content-Type: application/json" -d '{"email":"example@example.com","password":"yourpassword"}' http://your-app-url/api/register
```
**Example Response:**
```bash
{
  "token": "generated_api_token"
}

```

### Quotes Api


### Get Quotes:
_By default API response will be cached and will update after 30 secs_
```
/api/quotes
```

**Example Request:**
```bash
curl -H "Authorization: Bearer <your_token>" http://your-app-url/api/quotes
```
**Example Response:**
```bash
{
    "quotes": [
        "We as a people will heal. We will insure the well being of each other",
        "People only get jealous when they care.",
        "I hate when I'm on a flight and I wake up with a water bottle next to me like oh great now I gotta be responsible for this water bottle",
        "I care. I care about everything. Sometimes not giving a f#%k is caring the most.",
        "I love UZI. I be saying the same thing about Steve Jobs. I be feeling just like UZI"
    ]
}

```


### Refresh Quotes:
```
/api/quotes/refresh
```
**Example Request:**
```bash
curl -H "Authorization: Bearer <your_token>" http://your-app-url/api/quotes/refresh
```
**Example Response:**
```bash
{
    "quotes": [
        "I leave my emojis bart Simpson color",
        "I am the head of Adidas. I will bring Adidas and Puma back together and bring me and jay back together",
        "I give up drinking every week",
        "I love UZI. I be saying the same thing about Steve Jobs. I be feeling just like UZI",
        "Artists are founders"
    ]
}
```


## Running Tests

To run tests, run the following command

```bash
  php artisan test
```
