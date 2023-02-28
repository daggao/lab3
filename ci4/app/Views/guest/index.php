<h2><?= esc($title) ?></h2>

<?php if (! empty($guest) && is_array($guest)): ?>

    <?php foreach ($guest as $guest_item): ?>

        
        <div class="main">
        <h3><?= esc($guest_item['title']) ?></h3>
            <p><?= esc($guest_item['email']) ?>
            <p><?= esc($guest_item['website']) ?>
            <p><?= esc($guest_item['comment']) ?>
            <p><?= esc($guest_item['gender']) ?>
        </div>
        <p><a href="/lab3/ci4/public/guest<?= esc($guest_item['slug'], 'url') ?>">View article</a></p>
    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>