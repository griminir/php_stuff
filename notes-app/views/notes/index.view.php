<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>



<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <?php foreach ($notes as $note) : ?>
      <ul>
        <li>
          <a href="/notes-app/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['body']) ?>
          </a>
        </li>
      <?php endforeach; ?>
      </ul>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">
        <a href="/notes-app/notes/create" class="text-white">Add Note</a>
      </button>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>