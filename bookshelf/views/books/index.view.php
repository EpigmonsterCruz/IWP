<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

      <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <form action="" method="get">
            <input type="search" name="search" placeholder="Search..." class="px-5 py-2">
            <button type="submit" class="bg-blue-600 px-5 py-2 text-white " >
              Search
            </button> 

          </form>
          <hr class="my-8 border">
          <p class="mb-4">
            <a href="<?= BASE_URL ?>/books/create" class="text-blue-500 hover:underline">Add New Book...</a>
          </p>
            <table class=" w-full border-collapse border border-gray-400 ...">
              <thead class="text-xs uppercase bg-gray-200">
                <tr>
                  <th class="border border-gray-300 px-3 py-3">Title</th>
                  <th class="border border-gray-300 px-3 py-3">Author</th>
                  <th class="border border-gray-300 px-3 py-3">Publisher</th>
                  <th class="border border-gray-300 px-3 py-3">Year</th>
                  <th class="border border-gray-300 px-3 py-3">ISBN</th>
                  <th class="border border-gray-300 px-3 py-3">View</th>
                  <th class="border border-gray-300 px-3 py-3">Edit</th>
                  <th class="border border-gray-300 px-3 py-3">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                  <td class="border border-gray-300 px-2 py-2"><?= $book['title'] ?></td>
                  <td class="border border-gray-300 px-2 py-2"><?= $book['author'] ?></td>
                  <td class="border border-gray-300 px-2 py-2"><?= $book['publisher'] ?></td>
                  <td class="border border-gray-300 px-2 py-2"><?= $book['year'] ?></td>
                  <td class="border border-gray-300 px-2 py-2"><?= $book['ISBN'] ?></td>
                  <td class="border border-gray-300 px-2 py-2"><a href="<?= BASE_URL ?>/books/show?id=<?= $book['id'] ?>" class="text-blue-500 hover:underline">View</a></td>
                  <td class="border border-gray-300 px-2 py-2"><a href="<?= BASE_URL ?>/books/edit?id=<?= $book['id'] ?>" class="text-blue-500 hover:underline">Edit</a></td>
                  <td class="border border-gray-300 px-2 py-2">
                    <form method="POST">
                      <input type="hidden" name="id" value="<?= $book['id'] ?>" >
                      <input type="hidden" name="_method" value="DELETE" >
                      <input type="submit" value="Delete" class="text-sm text-red-500 hover:underline">
                    </form>
                    
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
         </div>
      </main>
<?php require base_path('views/partials/footer.php'); ?>
