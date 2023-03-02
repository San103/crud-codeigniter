
<div class="container" style="margin-top:2rem;">
    <div style="margin-bottom:5rem; display:flex">
        <h2><?= esc($title) ?></h2>
        <a href="/news/create" style="margin-left:2rem" class="btn btn-success">Add News</a>
    </div>
    <div class="row justify-content-center">
        <?php if (!empty($news) && is_array($news)) : ?>

            <?php
            $num_columns = 3; // Set the number of columns
            $count = count($news); // Count the number of news items
            $col_width = ceil($count / $num_columns); // Calculate the number of news items to display in each column
            $index = 0; // Initialize the index for the news array
            ?>

            <?php for ($i = 0; $i < $num_columns; $i++) : // Loop through each column 
            ?>
                <div class="col-sm-3"> <!-- Column -->
                    <?php for ($j = 0; $j < $col_width && $index < $count; $j++) : // Loop through the news items for this column 
                    ?>
                        <div class="card card-fixed-height mt-5 ">
                        <img class="card-img-top" src="<?= esc(base_url('public/uploads/'.$news[$index]['image_url'])) ?>" alt="<?= esc($news[$index]['title']) ?>" alt="Card image cap">
                            <div class="card-body ">
                                <h5 class="card-title"><?= esc($news[$index]['title']) ?></h5>
                                <p class="card-text"><?= esc($news[$index]['body']) ?></p>
                                <a class="btn btn-primary" href="/news/<?= esc($news[$index]['slug'], 'url') ?>">View article</a>

                                
                                

                            </div>
                        </div>
                        <?php $index++; // Increment the index for the news array 
                        ?>
                    <?php endfor ?>
                </div>
            <?php endfor ?>

        <?php else : ?>

            <h3>No News</h3>
            <p>Unable to find any news for you.</p>

        <?php endif ?>
    </div>
</div>