## Prerequisites
Docker installed, preferably running on an *nix OS as this has not been tested on Windows

## Run the application
- cd to the root directory of this application `php-microservice`
- run `bash build.sh` to build the php microservice image
- run `docker-compose up -d` to start the application

## Making API calls
You'll need to call the `http://localhost/v1/gifs/search/banana` endpoint

API calls require that you supply a JWT Authorization token with the headers.

If you're using postman to make API calls, do the following:

- click on the `Headers` tab
- add a header with the key `Authorization`
- add the value `Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTW9oYW1tZWQgS2FkaXJpIn0.waTr3KLHmiOg9h3N6dW3tMtr9oq7XT6jW4qYsKDbhC8` 

If you wish to generate your own JWT token you can do so at `https://jwt.io`, make sure to use the correct JWT secret which I've defined as `MoWasHere` in the docker-compose file

## API endpoints
- GET `/v1/gifs/search/{search-term}`