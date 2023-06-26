<?php $pager->setSurroundCount(2); ?>
<nav class=" mr-8 flex ml-auto">
    <ul class="pagination m-0 pl-0 flex">
        <?php if ($pager->hasPrevious()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="First" class="page-link text-center text-3 leading-10">
                    <div class="border rounded-full w-[42px] flex justify-center diaktifkan">
                        <span aria-hidden="true">First</span>
                    </div>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link text-center text-4 leading-10" aria-label="Previous">
                    <div class="border rounded-full w-[42px] flex justify-center">
                        <span>&laquo;</span>
                    </div>
                </a>
            </li>
        <?php } ?>

        <?php
        foreach ($pager->links() as $link) {
            $activeclass = $link['active'] ? 'active' : '';
        ?>
            <li class="page-item <?= $activeclass ?> mr-[2px]">
                <a href="<?= $link['uri'] ?>" class="page-link text-center text-4 leading-10">
                    <div class="border rounded-full w-[42px] flex justify-center diaktifkan">
                        <?= $link['title'] ?>
                    </div>
                </a>
            </li>
        <?php } ?>

        <?php if ($pager->hasNext()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="Next" class="page-link text-center text-4 leading-10">
                    <div class="border rounded-full w-[42px] flex justify-center diaktifkan">
                        <span aria-hidden="true">&raquo;</span>
                    </div>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" aria-label="Last" class="page-link text-center text-3 leading-10">
                    <div class="border rounded-full w-[42px] flex justify-center diaktifkan">
                        <span aria-hidden="true">Last</span>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>