<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

<section>
    <div class="container mx-auto p-4 flex flex-col justify-center items-center h-96">
        <div class="text-center text-3xl font-bold my-4"><?= $status ?></div>
        <p class="text-center text-xl mb-4">
            <?= $message ?>
        </p>
    </div>
</section>

