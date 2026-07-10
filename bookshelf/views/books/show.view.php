<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

      <main>
        <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

          <div class="bg-white shadow-sm rounded-md border border-gray-200">
            <dl class="divide-y divide-gray-200">
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Title</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['title'] ?></dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Author</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['author'] ?></dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Publisher</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['publisher'] ?></dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Year</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['year'] ?></dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['ISBN'] ?></dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Added By</dt>
               <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><?= $book['user_name'] ?></dd>
              </div>
            </dl>
          </div>

          <div class="mt-6 flex items-center gap-x-6">
            <a href="<?= BASE_URL ?>/books" class="text-sm/6 font-semibold text-gray-900">&larr; Back to Books</a>
            <a href="<?= BASE_URL ?>/books/edit?id=<?= $book['id'] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Edit</a>
          </div>

        </div>
      </main>
<?php require base_path('views/partials/footer.php'); ?>
