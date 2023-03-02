
<div class="container">
  <h2 class="text-center mt-5"><?= esc($title) ?></h2>

  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>

      <?= form_open('news/edit/' . esc($news['id']), ['method' => 'post']); ?>

<?= csrf_field() ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($news['id']); ?>">
        <div class="form-group">
          <label for="title">News Title</label>
          <input type="input" class="form-control" name="title" value="<?= esc($news['title']); ?>"><br>
        </div>

        <div class="form-group mt-5">
          <label for="body">Description</label>
          <textarea class="form-control" name="body"><?= esc($news['body']); ?></textarea><br>
        </div>
        <input type="submit" class="btn btn-primary mt-5" name="submit" value="Update news item">

    </div>
  </div>
</div>
