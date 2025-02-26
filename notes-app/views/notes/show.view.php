<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>



<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-10"><a href="/notes-app/notes" class="text-blue-500 hover:underline">go back</a></p>
    <p><?= htmlspecialchars($note['body']) ?></p>

    <form method="POST" class="mt-6">
      <input hidden name="id" type="text" value="<?= $note['id'] ?>">
      <input hidden name='_method' value="DELETE" type="text">
      <button class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php require base_path('views/partials/footer.php') ?>