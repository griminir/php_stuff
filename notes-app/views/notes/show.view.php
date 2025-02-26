<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>



<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-10"><a href="/notes-app/notes" class="text-blue-500 hover:underline">go back</a></p>
    <p><?= htmlspecialchars($note['body']) ?></p>

    <footer class="mt-6">
      <a class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="/notes-app/note/edit?id=<?= $note['id'] ?>">Edit</a>
    </footer>

    <form method="POST" class="mt-6">
      <input hidden name="id" type="text" value="<?= $note['id'] ?>">
      <input hidden name='_method' value="DELETE" type="text">
      <button class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>