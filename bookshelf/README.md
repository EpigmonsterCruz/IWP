

This project extends the BookShelf application with the two features required by Assignment 2: View a Book and Edit a Book.

 Setup

1. Import `database.sql` into MySQL (creates the `bookshelf` database with
   `users` and `books` tables and a little sample data).
2. Confirm `config/config.php` matches your local MySQL credentials.
3. Serve the project so that it's reachable at `http://localhost/bookshelf`
   (this matches the `BASE_URL` constant in `index.php`), then open
   `http://localhost/bookshelf/books`.

What was added

 Deliverable 1 — View a Book (Read)
- Route: `GET /books/show` → `controller/books/show.php`
- Reads the book id from the query string (`?id=`), validates it with
  `Core\Validator::numberVal()`, joins `books` with `users` to also pull the
  owner's name, and renders `views/books/show.view.php`.
- The View link on the books list (`views/books/index.view.php`) now
  points to `/books/show?id=...` instead of the placeholder link that
  duplicated the Edit link.

Deliverable 2 — Edit a Book (Update, via PATCH)
- Routes:
  - `GET /books/edit` → `controller/books/edit.php` (loads the book and
    shows a pre-filled form, same layout/pattern as `create.view.php`)
  - `PATCH /books/edit` → `controller/books/update.php` (validates and
    updates the record)
- Because plain HTML forms can't send a real PATCH request, the edit form
  submits a normal `POST` with a hidden `<input name="_method" value="PATCH">`
  field — exactly the same method-spoofing technique used for `DELETE` in
  the Delete Book feature from lecture. `routes.php` already reads
  `$_POST['_method']` to decide the actual HTTP verb, so no router changes
  were needed beyond registering the new routes.
- `update.php` reuses the same validation rules as `store.php`
  (`Validator::textVal` / `Validator::numberVal`) and uses a prepared
  `UPDATE ... WHERE id = :id` statement via `Database::runQuery()`.
- On success it redirects back to `/books`; on validation failure it
  re-renders the edit form with the entered values and error messages,
  the same pattern used by `store.php`.

 Other small fixes made along the way
- `controller/books/index.php`: removed a leftover `$conn->close()` call on
  an undefined `$conn` variable that would otherwise throw a fatal error.
- `controller/books/create.php`: added the missing `$error = []`
  initialization (the view references `$error[...] ?? ''`).
- `controller/books/store.php`: added `exit()` after the redirect header so
  the page doesn't keep rendering after a successful insert, and pointed the
  redirect at `BASE_URL` instead of a relative path.
- Existing Create and Delete functionality is untouched otherwise.

Files added

controller/books/show.php
controller/books/edit.php
controller/books/update.php
views/books/show.view.php
views/books/edit.view.php
database.sql

