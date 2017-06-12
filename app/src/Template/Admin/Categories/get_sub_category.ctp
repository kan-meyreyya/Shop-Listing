
<?php if ($category) : ;?>
    <ul>
        <?php foreach ($category as $item) : ;?>
            
            <li class="text-green"><?php echo $item->name; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p class="text-red">Sub category not found.</p>
<?php endif; ?>