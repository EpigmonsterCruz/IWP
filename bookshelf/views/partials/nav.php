      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="shrink-0">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <a href="<?=  BASE_URL ?>/" class="rounded-md px-3 py-2 text-sm font-medium 
                  <?= urlIS('/') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>
                  ">Home</a>
                  <a href="<?=  BASE_URL ?>/about" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIS('/about') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">About Us</a>
                  <a href="<?=  BASE_URL ?>/contact" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIS('/contact') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Contact Us</a>
                  <a href="<?=  BASE_URL ?>/books" class="rounded-md px-3 py-2 text-sm font-medium <?= urlIS('/books') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">Books</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
