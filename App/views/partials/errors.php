<?php if (isset($errors)) : ?>
    <?php foreach ($errors as $error) : ?>
        <div class="flex items-start gap-3 my-3 px-4 py-3 rounded-lg"
             style="background-color: rgba(69, 10, 10, 0.40);
                    border-left: 4px solid #EF4444;">
            <span class="flex-shrink-0 mt-0.5" style="color:#FCA5A5;">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i>
            </span>
            <p class="text-sm font-medium" style="color:#FECACA;"><?= $error ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
