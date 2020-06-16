<div class="card">
    <div class="row">
        <div class="card-image col s12 m4">
            <a 
            href="<?php echo $item['url']; ?>" 
            title="<?php echo $item['title']; ?>"
            class="row">
                <img src="<?php echo $item['photo']; ?>">
            </a>
        </div>
        <div class="card-content col s12 m8">
            <div class="fecha"><?php echo $item['date']; ?></div>
            <div class="titulo card-title">
                <a 
                href="<?php echo $item['url']; ?>" 
                title="<?php echo $item['title']; ?>"
                >
                    <?php echo $item['title']; ?>
                </a>
            </div>
            <div class="texto">
                <?php echo $item['text']; ?>
            </div>
        </div>
    </div>
</div>
