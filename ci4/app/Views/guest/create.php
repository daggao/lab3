<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/~bsdaggao2/lab3/ci4/public/guest/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Name</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="email">Email</label>
    <textarea name="email" cols="45" rows="4"><?= set_value('email') ?></textarea>
    <br>

    <label for="website">Website</label>
    <textarea name="website" cols="45" rows="4"><?= set_value('website') ?></textarea>
    <br>

    <label for="comment">Comment</label>
    <textarea name="comment" cols="45" rows="4"><?= set_value('comment') ?></textarea>
    <br>

    <label for="gender">Gender</label>
    <textarea name="gender" cols="45" rows="4"><?= set_value('gender') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create guest item">
</form>
