<?php require base_path('partials/head.php'); ?>

<?php require base_path('partials/nav.php'); ?>

<?php require base_path('partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- <h1>Notes Page</h1> -->

        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">go back</a>
        </p>

        <p><?= htmlspecialchars($note['body']) ?></p>

        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
        </footer>

        <form class="mt-6" method="POST" action="/note-delete">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-dm text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require base_path('partials/footer.php'); ?>