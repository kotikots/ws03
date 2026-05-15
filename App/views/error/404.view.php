<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">404</div>
        <p class="text-center h2-style marg-bot">
            Page not found.
        </p>
        <p class="text-center mt-6 text-lg font-medium text-pretty sm:text-xl/8 marg-bot">
            Sorry, we couldn’t find the page you’re looking for.
        </p>
        <div class="flex justify-center">
            <a href="/" class="text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-yellow-500">
                Go back home
            </a>
        </div>
    </div>
</section>
