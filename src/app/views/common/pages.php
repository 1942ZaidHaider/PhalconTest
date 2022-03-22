<!-- <pre class='text-light bg-success'> -->
<?php
$get = $_GET['_url'] ?? "/";
//echo $get;
$get = ltrim($get, '/');
//echo $get;
$args = explode("/", $get);
$baseUrl = $args[0] . '/' . $args[1];
?>
<!-- </pre> -->

<div class='pagination'>
    <div class="rounded overflow-hidden m-auto p-1">
        <a class='page-item rounded page-link bg-dark border-secondary d-inline-block text-warning' href='<? echo "/$baseUrl/" . $paginate->getFirst() ?>'>First</a>
        <a class='page-item rounded page-link bg-dark border-secondary d-inline-block text-warning <? echo $paginate->getCurrent() <= 1 ? "invisible'" : ""; ?>' href='<? echo "/$baseUrl/" . $paginate->getPrevious() ?>'>Previous</a>
        <? for ($x = 1; $x <= $paginate->getLast(); $x++) : ?>
            <a class='page-item rounded page-link <?if($paginate->getCurrent() == $x) {?>bg-primary text-light border-primary<?} else {?>bg-dark border-secondary text-warning <?}?> d-inline-block' href='<? echo "/$baseUrl/" . $x ?>'><? echo $x; ?></a>
        <? endfor ?>
        <a class='page-item page-link rounded bg-dark border-secondary d-inline-block text-warning <? echo $paginate->getCurrent() >= $paginate->getLast() ? "invisible'" : ""; ?> ' href='<? echo "/$baseUrl/" . $paginate->getNext() ?>'>Next</a>
        <a class='page-item page-link rounded bg-dark border-secondary d-inline-block text-warning' href='<? echo "/$baseUrl/" . $paginate->getLast() ?>'>Last</a>
    </div>
</div>