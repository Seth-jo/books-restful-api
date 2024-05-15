# Books API

This is a simple RESTful API for managing books, authors, and genres. The API provides CRUD (Create, Read, Update, Delete) operations for each of these resources.

## Base URL

The base URL for this API is currently just localhost:8000 - the default for self-hosting a Laravel project. 

## POST routes

All POST routes currently require all parameters, excluding id. A list of these can be found by using the GET route of the resource.

## Endpoints

### Authors

- `GET /authors`: Get a list of all authors.
  - Query Parameters:
    - `name[eq]` (optional): Filter authors by name in an exact match
    - `name[lk]` (optional): Search authors by name
    - `genreId[eq]` (optional): Filter authors by the id of a genre in an exact match
- `GET /authors/{id}`: Get a specific author by ID.
- `POST /authors`: Create a new author.
- `PUT /authors/{id}`: Update an existing author.
- `DELETE /authors/{id}`: Delete an author.

- ### Books

- `GET /books`: Get a list of all books.
  - Query Parameters:
        - `title[eq]` (optional): Filter books by title in an exact match
        - `title[lk]` (optional): Search books by title
        - `isbn[eq]` (optional): 
        - `genreId[eq]` (optional): Filters books by the id of a genre in an exact match
        - `authorId[eq]` (optional): Filters books by the id of an author in an exact match
- `GET /books/{id}`: Get a specific book by ID.
- `POST /books`: Create a new book.
- `PUT /books/{id}`: Update an existing book.
- `DELETE /books/id`: Delete a book.

### Genres

- `GET /genres`: Get a list of all genres.
  - Query Parameters:
        - `name[eq]` (optional): Filter genres by name in an exact match
        - `name[lk]` (optional): Search genre by name
- `GET /genres/:id`: Get a specific genre by ID.
- `POST /genres`: Create a new genre.
- `PUT /genres/:id`: Update an existing genre.
- `DELETE /genres/:id`: Delete a genre.

## Examples of Requests and Responses

#### Request

Using POST /authors
Content-Type: application/json

```json
{
  "name": "J.K. Rowling",
  "genre": "Fantasy"
}
```

#### Response

Using GET/genres
 
```json
[
  {
    "id": 1,
    "name": "Fiction"
  },
  {
    "id": 2,
    "name": "Non-Fiction"
  }
]
```


## Future Work

### Authentication
Currently, the basic setup is there for an API to handle CRUD operations, but all requests are authorised. In a realistic scenario, we need to use authentication and a bearer token - we can do this through our Policies, but were constrained by time in this initial implementation.

### Custom handling
Laravel provides error handling by default, however we can provide a better user journey by providing custome messages. These allow users to better understand what the issue is and how to fix it.

### Further filtering
It would depend on user feedback, but I can imagine there're further queries that could be provided in the parameters, such as a SortBy functionality, or including all Books of an Author through the Authors endpoint (even if it's achievable through filtering on the Books endpoint). In addition, I needed to configure the In operator, but ran out of time.

### Sanitization
Whilst there is a level of in built sanitization, it would be good to add further methodologies on top - external facing APIs hold inherent risk and this has to be handled.
