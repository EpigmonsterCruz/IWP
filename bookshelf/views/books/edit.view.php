<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

      <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

          <form method="POST" action="<?= BASE_URL ?>/books/edit">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <input type="hidden" name="_method" value="PATCH">
            <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-6">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                      <input id="title" value="<?= $book['title'] ?? '' ?>" type="text" name="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                      <p class="text-red-500 text-xs"><?= $error['title'] ?? '' ?></p>
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
                    <div class="mt-2">
                      <input id="author" type="text" value ="<?= $book['author'] ?? '' ?>" name="author" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                      <p class="text-red-500 text-xs"><?= $error['author'] ?? '' ?></p>
                    </div>
                  </div>
                  <div class="sm:col-span-2">
                    <label for="publisher" class="block text-sm/6 font-medium text-gray-900">publisher</label>
                    <div class="mt-2">
                      <input id="publisher" value="<?= $book['publisher'] ?? '' ?>" type="text" name="publisher" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                      <p class="text-red-500 text-xs"><?= $error['publisher'] ?? '' ?></p>
                    </div>
                  </div>

                  <div class="sm:col-span-1 sm:col-start-1">
                    <label for="year" class="block text-sm/6 font-medium text-gray-900">Year</label>
                    <div class="mt-2">
                      <input id="year" type="text" value="<?= $book['year'] ?? '' ?>" name="year"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                      <p class="text-red-500 text-xs"><?= $error['year'] ?? '' ?></p>                   
                    </div>
                  </div>

                  <div class="sm:col-span-2">
                    <label for="ISBN" class="block text-sm/6 font-medium text-gray-900">ISBN</label>
                    <div class="mt-2">
                      <input id="ISBN" value="<?= $book['ISBN'] ?? '' ?>" type="text" name="ISBN"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                      <p class="text-red-500 text-xs"><?= $error['ISBN'] ?? '' ?></p>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="user" class="block text-sm/6 font-medium text-gray-900">User</label>
                    <div class="mt-2 grid grid-cols-1">
                      <select id="user" name="user" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
  <?php foreach ($users as $user):?>  
      <option value="<?= $user['id'] ?>" <?php 
        if (($book['full_name'] ?? null) == $user['id']){
            echo "selected";
        }
      ?>>
        <?= $user['full_name'] ?>
      </option>
  <?php endforeach; ?>
</select>
                      <p class="text-red-500 text-xs"><?= $error['userID'] ?? '' ?></p>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
              <a href="<?= BASE_URL ?>/books" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
          </form>

        </div>
      </main>
<?php require base_path('views/partials/footer.php'); ?>
