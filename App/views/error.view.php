<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

<section>
    <div class="container mx-auto p-4 flex flex-col justify-center items-center h-96">
        <div class="text-center text-3xl font-bold my-4"><?= $status ?></div>
        <p class="text-center text-xl mb-4">
            <?= $message ?>
        </p>
        <a  class="block text-center" href="/listings">Go Back to listing</a>
    </div>
</section>

