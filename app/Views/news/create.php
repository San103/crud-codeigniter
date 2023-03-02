<div class="container">
  <h2 class="text-center mt-5"><?= esc($title) ?></h2>

  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>

      <form action="/news/create" method="post" enctype="multipart/form-data">
        <!-- add enctype="multipart/form-data" to the form element -->
        <?= csrf_field() ?>

        <div class="form-group">
          <label for="title">News Title</label>
          <input type="input" class="form-control" name="title" value="<?= set_value('title') ?>">
        </div>

        <div class="form-group mt-5">
          <label for="body">Description</label>
          <textarea name="body" class="form-control" cols="45" rows="4"><?= set_value('body') ?></textarea>
        </div>

        <!-- add a new input field for the image file -->
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-primary mt-5">Create news item</button>
      </form>

    </div>
  </div>
</div>