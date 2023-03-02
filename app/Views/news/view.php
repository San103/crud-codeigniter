<div class="section mt-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex align-items-center ">
                <img class="img-fluid mr-3" src="<?= esc(base_url('public/uploads/' . $news['image_url'])) ?>" alt="<?= esc($news['title']) ?>" style="width:50%">
                <div class="">
                    <h2><?= esc($news['title']) ?></h2>
                    <p><?= esc($news['body']) ?></p>
                    <form action="/news/delete" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= esc($news['id']) ?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <a href="/news/edit/<?= esc($news['id'], 'url') ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
